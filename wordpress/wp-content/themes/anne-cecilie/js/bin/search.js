(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['search'] = template({"compiler":[5,">= 2.0.0"],"main":function(depth0,helpers,partials,data) {
  var stack1, functionType="function", escapeExpression=this.escapeExpression;
  return "<div class=\"search-wrapper\">\n    <form class=\"search-form\" method=\"get\" action=\"/search.php\">\n        <input type=\"search\" name=\"q\" id=\"search-field\" placeholder=\""
    + escapeExpression(((stack1 = ((stack1 = (depth0 && depth0.texts)),stack1 == null || stack1 === false ? stack1 : stack1.placeholder)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"/>\n    </form>\n    <span class=\"glyphicon glyphicon-search\" title=\""
    + escapeExpression(((stack1 = ((stack1 = (depth0 && depth0.texts)),stack1 == null || stack1 === false ? stack1 : stack1.hover)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\"></span>\n</div>";
},"useData":true});
})();