(function(){
  tinymce.PluginManager.add('wysiwyg_buttons', function( editor, url ) {
    editor.addButton('ebutton', {
      title: 'Button',
      icon: 'icon dashicons-external',
      onclick: function() {
        editor.selection.setContent('[button align="" link="" target=""]' + editor.selection.getContent() + '[/button]');
      }
    });
    editor.addButton('youtube', {
      title: 'YouTube',
      icon: 'icon dashicons-video-alt3',
      onclick: function() {
        editor.insertContent('[youtube link=""]');
      }
    });
    editor.addButton('vimeo', {
      title: 'Vimeo',
      icon: 'icon dashicons-format-video',
      onclick: function() {
        editor.insertContent('[vimeo link=""]');
      }
    });
  });
})();
