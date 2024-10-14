(function(api) {

  api.sectionConstructor['zummo-upsell'] = api.Section.extend({
      attachEvents: function() {},
      isContextuallyActive: function() {
          return true;
      }
  });

  const zummo_section_lists = ['banner', 'service'];
  zummo_section_lists.forEach(zummo_homepage_scroll);

  function zummo_homepage_scroll(item) {
      item = item.replace(/-/g, '_');
      wp.customize.section('zummo_' + item + '_section', function(section) {
          section.expanded.bind(function(isExpanding) {
              wp.customize.previewer.send(item, { expanded: isExpanding });
          });
      });
  }
})(wp.customize);