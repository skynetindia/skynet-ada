/*
 * Custom blog JS
 */
$("body").on("click", ".add-blog-cat", function(ev) {
    var catlist=$(".default-category-list").html();
    $(".blog-cat-select-body").append(catlist);
});
$("body").on("click", ".delete-blog-cat", function(ev) {
    $(this).parent('tr').remove();
});
$("body").on("click", ".add-blog-tag", function(ev) {
    var taglist=$(".default-tag-list").html();
    $(".blog-tag-select-body").append(taglist);
});
$("body").on("click", ".delete-blog-tag", function(ev) {
    $(this).parent('tr').remove();
});
