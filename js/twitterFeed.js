var tweetConfig = {
  "id": '700329712393048064',
  "domId": '',
  "maxTweets": 3,
  "showRetweet": true,
  "customCallback": handleTweets,
  "dataOnly" : true
};

function handleTweets(tweets){
    var x = tweets.length;
    var n = 0;
    while(n < x) {
        var url = 'https://api.twitter.com/1/statuses/oembed.json?url=https://twitter.com/eclipsepaho/status/' + tweets[n]['tid'] +
        '&hide_media=true&hide_thread=true&omit_script=true&align=center';
        var context = {};
        context.n = n;
        $.ajax({url: url, dataType: "jsonp", context: context, success: function(result){
            var tweetBox = document.getElementById('tweet-' + this.n);
            tweetBox.innerHTML = result.html;
            twttr.widgets.load();
        }});
        n++;
    }
}

twitterFetcher.fetch(tweetConfig);
