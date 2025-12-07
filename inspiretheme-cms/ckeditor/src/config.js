let exports = {}

/* Heading Options */

exports.headingConfig = {
  options: [
    { model: 'paragraph', title: 'Normal', class: 'ck-heading_paragraph' },
    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
    { model: 'address', view: 'address', title: 'Address', class: 'ck-address' },
    {
      model: 'div',
      view: {
        name: 'div',
        classes: 'content-div'
      },
      title: 'Normal (Div)',
      class: 'ck-div'
    },
    {
      model: 'button',
      view: {
        name: 'div',
        classes: 'content-button'
      },
      title: 'Button',
      class: 'ck-div'
    }
  ]
};
exports.headingConfigEmail = {
  options: [
    { model: 'paragraph', title: 'Normal', class: 'ck-heading_paragraph' },
    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
  ]
};


/* Image Tool Config */
exports.imageConfig = {
  toolbar: [
    'imageTextAlternative', '|',
    'imageStyle:alignLeft',
    'imageStyle:full',
    'imageStyle:alignRight'
  ],
  styles: [
    'full',
    'alignLeft',
    'alignRight'
  ]
};

/* Table Content Toolbar Config */
exports.tableConfig = {
  contentToolbar: [
    'tableColumn',
    'tableRow',
    'mergeTableCells'
  ]
};

/* Media Toolbar Config */
exports.mediaEmbedConfig = {
  previewsInData: true,
  extraProviders: [
    {
      name: 'allow-all',
      url: /^.+/,
      html: match => `<div style="position:relative; padding-bottom:100%; height:0">
        <iframe src="${match.input}" frameborder="0" scrolling="no"  
        style="position:absolute; width:100%; height:100%; top:0; left:0; overflow:hidden">
        </iframe>
        </div>`
        
    }
  ]
};

/* Indent Block Config */
exports.indentBlockConfig = {
  offset: 1,
  unit: 'em'
};

/* Ckfinder Connector Config */
exports.ckfinderConfig = {
  uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
}

module.exports = exports;