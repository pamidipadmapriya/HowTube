function makePlayURL(vid){
	return "/"+vid+"/play.html";
}

/*function makeCategoryURL(name){
	return "/category/"+name+".html";
}*/

var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

var DateDiff = { 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000*7));
    },
 
    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();
 
        return (d2M+12*d2Y)-(d1M+12*d1Y);
    },
 
    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }
}

function getDuration( publishedDate, today ){
	var publishedOn = new Date(publishedDate.substr(0,10));
	var days = DateDiff.inDays(publishedOn, today);
	if (days > 0){
		if (days <= 30){
			return (days+" day(s) ago");
		} else if (days > 30 && days < 365) {
			return (Math.floor(days/30)+" month(s) ago");
		} else if (days > 365) {
			return (Math.floor(days/365)+" year(s) ago");
		}
	}
}