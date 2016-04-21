var languages = {
    "java" : "https://github.com/eclipse/paho.mqtt.java",
    "python" : "https://github.com/eclipse/paho.mqtt.python"
}


var snippets;
var snippetSearchValue = "";
getIndex();


// Add Watcher to Search Box
setInterval(function() { updateSearch($('#snippet-search').val()); }, 100);

function updateSearch(value){
    if(snippetSearchValue !== value){
        snippetSearchValue = value.toLowerCase();
        var snippetSearchTags = snippetSearchValue.split(/[ ,]+/).filter(Boolean);
        for(var key in snippets){
            if(tagCompare(key.toLowerCase(),snippetSearchTags)){
                $(".snippet-" + snippets[key]['classIndex']).removeClass('hidden');
            } else {
                $(".snippet-" + snippets[key]['classIndex']).addClass('hidden');
            }
        }
    }
}

function tagCompare(sup, sub){
    for(var i = 0; i < sub.length; i++){
        if(sup.indexOf(sub[i]) === -1){
            return false;
        }
    }
    return true;

}


function updatePage(snippet_name){
    if(!isEmpty(snippet_name)){
        loadSnippet(snippet_name)
    } else {
        showIndex();
    }
}


function loadSnippet(snippet_name){
    // Set the title of the page
    setTitle(snippet_name);
    document.title = "Paho Examples: " + snippet_name;
    // Hide/Show divs
    $('.snippet-index').hide();
    $('.snippet').show();
    var snippet = snippets[snippet_name];
    var language = snippet['language'];
    $('.snippet-desc').text(snippet['description']);
    $('.snippet-lang').html(language + ' - <a href="' + languages[language] + '" target="_blank">' + languages[language] + '</a>');
    //$('.snippet-json').text(JSON.stringify(snippet,null,'\t'));

    $('.prettyprinted').removeClass('prettyprinted');
    $('.snippet-code').load('snippets/' + snippet['file'], function(){
        // Re-run Pretty Print
        PR.prettyPrint()
    });
    //var tagString = snippet['tags'].join(", ");
    //$('.snippet-tags').text(tagString);

}

function setTitle(new_title){
    $('snippet-title-text').text(new_title);
}

function getIndex(){
    $.getJSON("/paho/snippets/snippets/index.json", function(data) {
        var items = []
        snippets = data;
        var index = 0;
        $.each(data, function(key, val){
            items.push("<div class=\"item col-xs-4 col-lg-4 snippet-" + index + "\">\
                            <div class=\"panel panel-default\">\
                                <div class=\"panel-heading\">\
                                    <a href='#" + key + "'><h3 class=\"panel-title\">" + key + "</h3></a>\
                                </div>\
                                <div class=\"panel-body\">\
                                    " + val["description"]+ "\
                                </div>\
                            </div>\
                        </div>");
                        snippets[key]['classIndex'] = index;
                        ++index;
        });

        // $.each(data, function(key, val){
        //     items.push( "<li id='" + key + "'><a href='#" + key + "'>" + key + "</a></li>" );
        // });
        $( ".snippet-list" ).html(items.join( "" ));

       // If we are currently on a specific snippet, load it
       var snippetName = window.location.hash.substr(1);
       if(!isEmpty(snippetName)){
           loadSnippet(snippetName)
       } else {
           showIndex();
       }
    });
}

function showIndex(){
    // Set Title of page
    setTitle("Paho Example Snippets");
    document.title = "Paho Examples";
    // Hide/Show Divs
    $('.snippet').hide();
    $('.snippet-index').show();
}

$(window).on('hashchange', function() {
    var snippetName = window.location.hash.substr(1);
    updatePage(snippetName);
});

function isEmpty(str) {
    return (!str || 0 === str.length);
}
