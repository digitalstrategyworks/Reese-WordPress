jQuery.fn.extend({
	highlight: function(search, insensitive, class) {
	  var regex = new RegExp("(<[^>]*>)|(\\b"+ search.replace(/([-.*+?^${}()|[\]\/\\])/g,"\\$1") +")", insensitive ? "ig" : "g");
	  return this.html(this.html().replace(regex, function(a, b, c){
	    return (a.charAt(0) == "<") ? a : "<span class=\""+ class +"\">" + c + "</span>";
	  }));
	}
});
