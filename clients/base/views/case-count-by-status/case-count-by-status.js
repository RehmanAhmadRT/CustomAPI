/**
 * Case Count by Status example dashlet controller
 *
 * Controller logic watches the current collection on display and updates the
 * dashlet automatically whenever the current collection changes.
 *
 * This is a simple example of a dashlet for List Views in Sugar 7.x.
 *
 **/
({
    //This view uses the essential Dashlet plug-in
    plugins: ['Dashlet'],

    /**
     * Values is used by the template to display the statuses and counts.  Backs our Handlebars template.
     */
    values: undefined,

    /**
     * Keeps track of how many cases in total we're displaying.  Also used in our Handlebars template.
     */
    totalCases: undefined,

    /**
     * Keeps a map of status types by model ID as the key.
     */
    modelsMap: undefined,

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        // call the parent's (View's) initialize function
        // passing options as an array
        this._super('initialize', [options]);

        // initialize vars
        this.modelsMap = {};
        this.totalCases = 0;
        this.values = {};
    },

    /**
     * @inheritdoc
     */
    bindDataChange: function() {
        var ctx = this.context,
            collection = ctx.get("collection");
        if(_.isEmpty(collection)){  //Collection will be empty in "preview" mode
            return;
        }

        //Listening to 'reset' events on the collection
        collection.on('reset', function(collection) {
            // Ensure that collection exists, has models, then parse out models for display
            if(collection && collection.length) {
                this._parseModels(collection.models, false);
            }
        }, this);

        //Listening to 'add' and 'remove' events on the collection
        collection.on('add remove', function(model, collection, options)  {
            // The Backbone's options argument for 'add' and 'remove' events are different
            // if options.removed doesn't exist, then we will know this is a 'remove' event
            if (_.isUndefined(options.remove)) {
                options.remove = true;
            }

            // Backbone passes add/remove options as an event param, so we can tell
            // if this was the add or remove event and pass it to parseModels
            this._parseModels([model], options.remove);
        }, this);

        if(collection.models && _.isEmpty(this.modelsMap)) {
            // manually cause a parsing of the models
            // this covers the scenario when a user creates a new record
            this._parseModels(collection.models, true);
        }
    },

    /**
     * Recalculates values used in the template from modelsMap
     *
     * @private
     */
    _recalcValues: function() {
        // reset values
        this.values = {};
        this.totalCases = 0;

        _.each(_.values(this.modelsMap), function(status) {
            this.totalCases++;
            // check to see if we've already set a value
            // for this status
            if (this.values[status]) {
                // status is already set so just increment
                this.values[status].count++;
            } else {
                // add a new entry on the values object
                // with status as the key and an Object
                // with name and count for our template
                this.values[status] = {
                    name: status,
                    count: 1
                };
            }
        }, this);
    },

    /**
     * Takes an array of models and parses them into modelsMap then (re)counts the values in this map
     *
     * @param {Array} models The Array of models to parse
     * @param {Boolean} remove If the models passed in should be removed or not
     * @private
     */
    _parseModels: function(models, remove) {
        var id,
            status;

        _.each(models, function(model) {
            // get the case id & status
            id = model.get('id');
            status = model.get('status');

            if (remove && this.modelsMap[id]) {
                // if the function was called
                // to remove models, delete the id/value
                delete this.modelsMap[id];
            } else {
                // otherwise, add the id and status
                // to modelsMap
                this.modelsMap[id] = status;
            }
        }, this);

        // now that we've updated the modelsMap,
        // recalculate the this.values object for rendering
        this._recalcValues();

        // double-check that the view has not been disposed
        // if not, then re-render the dashlet
        if (!this.disposed) {
            this.render();
        }
    }
})
