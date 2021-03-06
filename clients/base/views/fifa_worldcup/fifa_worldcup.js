({
    plugins: ['Dashlet'],
    initDashlet: function () {
        if (this.meta.config) {
            var team = this.settings.get("team") || "FRA";
            this.settings.set("team", team);
            var todayorteam = this.settings.get("todayorteam") || "team";
            this.settings.set("todayorteam", todayorteam);
        }
        //this.model.on("change:name", this.loadData, this);
    },

    loadData: function (options) {
        var team;
        if (_.isUndefined(this.model)) {
            return;
        }
        team = this.settings.get('team') || 'FRA';
        todayorteam = this.settings.get('todayorteam') || 'team';
        arg='';
        purl = parent.location.href;
		baseurl = purl.substring(0,purl.indexOf('#'));
        if (todayorteam=='team') {
			if ((typeof team != 'undefined')) arg='/wc14/GetMyTeamScores?fifa_code=USA';//+team;
		} else arg='/wc14/GetScores';

		var self = this;
		app.api.call('GET', app.api.buildURL('/wc14/GetMyTeamScores?fifa_code=USA'), null,
		{
            success: function (data) {
                if (this.disposed) {
                    return;
                }

				formatDateUser = function(dstr){
					if ((typeof(dstr)=='undefined') || (dstr=='')) return '';
					var year  = dstr.substr(0,4);
					var month = dstr.substr(5,2)-1;
					var day   = dstr.substr(8,2);
					var hour  = dstr.substr(11,2);
					var min   = dstr.substr(14,2);
					var tz    = parseInt(dstr.substr(23,3)); // hours
					var date_game = Date.UTC(year, month, day, hour, min, 0, 0);
					var current_tz = app.user.attributes.preferences.tz_offset_sec; // secs
					var date_game_local = new Date();
					date_game_local.setTime(date_game + current_tz*1000 - tz*3600*1000);
					return(
						//dstr + ', tz=' + tz + ', current_tz=' + current_tz + ', ' +
						app.date(date_game_local).formatUser(true)+' '
						+formatTimeUser(date_game_local.getUTCHours(),date_game_local.getUTCMinutes(),app.user.attributes.preferences.timepref)
					);
				},

				formatTimeUser = function(h,m,pref){
					var ampm = '';
					if (pref.charAt(0)=='h') {//12
						if (h>11) ampm='pm'; else ampm='am';
						if (h>12) h-=12;
					}
					m = '' + m;
					if (m.length==1) m = '0' + m;
					return(h + ':' + m + ampm);
				}

				$.each(data, function(idx, obj) {
					obj.datetime = formatDateUser(obj.datetime);
					obj.url = baseurl;
				});
                _.extend(self, data);
                self.render();
            },
		}
		);
    },

})
