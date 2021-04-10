<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouTube Video Downloader | rafled.com</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://static.rafled.com/rafled.com.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.rafled.com/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->


</head>
<body>

    <h1>YouTube Video Downloader | <a href="https://rafled.com">rafled.com</a></h1>
 <center>
<form action="https://api.rafled.com/youtube-downloader/v1/">
    <input class="input-res" type="text" name="url" placeholder="paste video url here" size="80" id="txt_url" required/>
    <input class="button" type="button" id="btn_fetch" value="Download Video" onclick="unhidelol()">
    <input class="button" type="submit" value="JSON API">
     </form>
<div style="display:none;" id="hiddenlol">
<video width="800" height="600" controls>
    <source src="" type="video/mp4"/>
    <em>Sorry, your browser doesn't support HTML5 video.</em>
</video>
    </center>
   </div>
    <hr>
    <p> [Early Access] Now you can choose Video Quality and Audio quality when downloading, check it out <a href="https://rafled.com/beta/ytd.php">here</a>.</p>
    <hr>
    <p><b> Please Note:</b> This program is for personal use only. Downloading copyrighted material without permission is against <a href="https://www.youtube.com/static?template=terms">YouTube's terms of services</a>. By using this program, you are solely responsible for any copyright violations. We are not responsible for people who attempt to use this program in any way that breaks YouTube's terms of services.
    </p>
<script type="text/javascript">
    function unhidelol() {
   document.getElementById('hiddenlol').style.display = "block";
}
    </script>
<script>
    $(function () {
        $("#btn_fetch").click(function () {
            var url = $("#txt_url").val();
            var oThis = $(this);
            oThis.attr('disabled', true);
            $.get('video_info.php', {url: url}, function (data) {
                console.log(data);
                oThis.attr('disabled', false);
                var links = data['links'];
                var error = data['error'];
                if (error) {
                    alert('Error: ' + error);
                    return;
                }
                // first link with video
                var first = links.find(function (link) {
                    return link['format'].indexOf('video') !== -1;
                });
                if (typeof first === 'undefined') {
                    alert('No video found!');
                    return;
                }
                var stream_url = 'stream.php?url=' + encodeURIComponent(first['url']);
                var video = $("video");
                video.attr('src', stream_url);
                video[0].load();
            });
        });
    });
</script>

</body>
</html>

