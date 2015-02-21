
var blog = [
    {
        "title": "This is a title for THIS",
        "date": "2015-10-30",
        "author": "Isaac Castillo",
        "tags": [
            "web",
            "design",
            "html"
        ],
        "category": "development",
        "post": "oNE two three four five six oNE NE two three four five six oNE two three four  NE two two three four  NE two three four o three four five six NE two three four five six  three four five six NE two three four five six NE two three four five six NE two three four five six e six NE two three four fsix NE two three four five six  three four five six NE two three four five six NE two three four five six NE two three four five six e six NE two three f"
    },
    {
        "title": "This is a title for this",
        "date": "2015-11-31",
        "author": "Rodrigo Castillo",
        "blockquote": "THIS IS MY BLOCK QUOTE",
        "tags": [
            "new web",
            "new design",
            "new html"
        ],
        "category": "development",
        "post": "THIS MEANS THE LINK WORKED! And this is another thing. and another thing. And this is another thing. and another thing.",
        "secondpost": "ññnnnnnnñ"
    },
    {
        "title": "TItle the Third",
        "date": "2015/99/99",
        "author": "This O Ther Guy",
        "tags": [
            "this",
            "the other"
        ],
        "category": "the category",
        "post": "lSST post?"
    }
]

var posts = document.getElementById("posts");

console.log(posts);

var itemString = " ";

for (i=0; i < blog.length; i++) {

    itemString += '<h2>' + blog[i].title + '</h2>'
    itemString += '<h4><p>' + blog[i].post + '<p></h4>'
    itemString += '<strong><p>' + blog[i].date + '</strong></p>'
    itemString += '<em>' + blog[i].author + '</em>'
    itemString += '<h6>' + blog[i].tags + '</h6>'
    itemString += '<h5>' + blog[i].category + '</h5>'
};

posts.innerHTML = itemString;

// POST 1
// var postTitle = document.getElementById('postTitle1');
// postTitle1.innerHTML = blog[0].title;

// var postDate = document.getElementById('postDate1');
// postDate1.innerHTML = blog[0].date;

// var postAuthor = document.getElementById('postAuthor1');
// postAuthor1.innerHTML = blog[0].author;

// var postPost = document.getElementById('postPost1');
// postPost1.innerHTML = blog[0].post;

// POST 2

// var postTitle2 = document.getElementById('postTitleTwo');
// postTitle2.innerHTML = blog[1].title;

// var postDate2 = document.getElementById('postDateTwo');
// postDate2.innerHTML = blog[1].date;

// var postAuthor2 = document.getElementById('postAuthorTwo');
// postAuthor2.innerHTML = blog[1].author;

// var postPost2 = document.getElementById('postPostTwo');
// postPost2.innerHTML = blog[1].post;

// var postPost22 = document.getElementById('postPostTwoTwo');
// postPost22.innerHTML = blog[1].secondpost;

// var postBlock2 = document.getElementById('postBlockTwo');
// postBlock2.innerHTML = blog[1].blockquote;




title
date - author - category
tags: web, design, html
image - post

title
date - author - category
tags: web, design, html
post
image - post