
{{ Html::script('assets/admin1/js/custom.js') }}

<script>
$(document).ready(function () {
Pleasure.init();
Layout.init();
UserPages.profile();
FormsWizard.init();
TablesDataTables.init();
});
</script>
<!-- END INITIALIZATION-->

<!-- BEGIN Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', Pleasure.settings.ga.urchin, Pleasure.settings.ga.url);
ga('send', 'pageview');
</script>
<!-- END Google Analytics -->