
function ($, Drupal, drupalSettings) {
  var data = 0;
  /**
   * @namespace
   */
  Drupal.behaviors.mymoduleAccessData = {
    attach: function (context) {
      data = drupalSettings.mymoduleComputedData;
    }
  };
  window.fbAsyncInit = function() {
  FB.init({
    appId            : data,
    autoLogAppEvents : true,
    xfbml            : true,
    version          : 'v2.12'
  });
};
(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
})(jQuery, Drupal, drupalSettings);
