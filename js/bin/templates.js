(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['search'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div class=\"search-wrapper\">\n    <span class=\"glyphicon glyphicon-search\" title=\""
    + escapeExpression(((stack1 = ((stack1 = (depth0 && depth0.texts)),stack1 == null || stack1 === false ? stack1 : stack1.hover)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"></span>\n    <form class=\"search-form\" method=\"get\" action=\"/search.php\">\n        <input type=\"search\" name=\"q\" class=\"search-field\" placeholder=\""
    + escapeExpression(((stack1 = ((stack1 = (depth0 && depth0.texts)),stack1 == null || stack1 === false ? stack1 : stack1.placeholder)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"/>\n    </form>\n    <div class=\"clearfix\"></div>\n</div>";
  return buffer;
  });
})();