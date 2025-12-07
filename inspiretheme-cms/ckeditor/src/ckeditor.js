'use strict';

/* The editor creator to use. */
import ClassicEditorBase from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import InlineEditorBase from '@ckeditor/ckeditor5-editor-inline/src/inlineeditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import AutoSave from '@ckeditor/ckeditor5-autosave/src/autosave';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import CKFinderUploadAdapter from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter';

/* TYPOGRAPHY PLUGINS */
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Code from '@ckeditor/ckeditor5-basic-styles/src/code';
import Subscript from '@ckeditor/ckeditor5-basic-styles/src/subscript';
import Superscript from '@ckeditor/ckeditor5-basic-styles/src/superscript';
import RemoveFormat from '@ckeditor/ckeditor5-remove-format/src/removeformat';

/* FORMATING PLUGINS */
import Font from '@ckeditor/ckeditor5-font/src/font';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import Indent from '@ckeditor/ckeditor5-indent/src/indent';
import IndentBlock from '@ckeditor/ckeditor5-indent/src/indentblock';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';

/* COMPONENT PLUGINS */
import Table from '@ckeditor/ckeditor5-table/src/table';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar';
import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';
import EasyImage from '@ckeditor/ckeditor5-easy-image/src/easyimage';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert.js';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed';

/* CUSTOM PLUGINS */
import Placeholder  from '../plugin/placeholder';
import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize';

import CKBox from '@ckeditor/ckeditor5-ckbox/src/ckbox';
import CloudServices from '@ckeditor/ckeditor5-cloud-services/src/cloudservices';
import CodeBlock from '@ckeditor/ckeditor5-code-block/src/codeblock';

import FontBackgroundColor from '@ckeditor/ckeditor5-font/src/fontbackgroundcolor';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor';
import FontFamily from '@ckeditor/ckeditor5-font/src/fontfamily';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize';
import Highlight from '@ckeditor/ckeditor5-highlight/src/highlight';
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline';
import PasteFromOffice from '@ckeditor/ckeditor5-paste-from-office/src/pastefromoffice';
import PictureEditing from '@ckeditor/ckeditor5-image/src/pictureediting';
import TableColumnResize from '@ckeditor/ckeditor5-table/src/tablecolumnresize';
import TextTransformation from '@ckeditor/ckeditor5-typing/src/texttransformation';

import Template from '@ckeditor/ckeditor5-template/src/template';
import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport';

/* IMPORT TOOLs CONFIG and PRESETS */
import {headingConfig, headingConfigEmail, imageConfig, tableConfig, mediaEmbedConfig, indentBlockConfig, ckfinderConfig, sourceEditingConfig, sourceEasyImage} from './config';


const plugins = [
  EssentialsPlugin,
  AutoformatPlugin,
  ParagraphPlugin,
  AutoSave,
  MediaEmbed,
  HeadingPlugin, Font, Alignment,
  Bold, Italic, Underline, Strikethrough, Subscript, Superscript, RemoveFormat,
  BlockQuotePlugin, LinkPlugin, ListPlugin, CKFinder, Indent, IndentBlock,
  Table, TableToolbar,
  Image, ImageCaption, ImageInsert, ImageToolbar, ImageUpload, ImageStyle, ImageResize,
  Placeholder, SourceEditing, CKFinderUploadAdapter, CloudServices, CodeBlock, FontBackgroundColor,
  Highlight, HorizontalLine, PasteFromOffice, PictureEditing, TableColumnResize, TextTransformation, Template, GeneralHtmlSupport,
];
 
/* DEFINE CLASSIC EDITOR */

class ClassicEditor extends ClassicEditorBase {
  
}

ClassicEditor.builtinPlugins = plugins;

const toolbarClassicEditor = [
  'heading', '|',
  'bold', 'italic', 'underline', 'strikethrough', 'alignment', '|',      
  'blockQuote','link', 'bulletedList', 'numberedList', 'outdent', 'indent', '|',
  'ckfinder', 'insertTable', '|',
  'removeFormat', '|',
  'sourceEditing', '|',
  'CodeBlock', 'horizontalLine',
  'fontSize',
  'fontColor',
  '|', 'insertTemplate', '|',
  'undo', 'redo'
];

ClassicEditor.defaultConfig = {
  language: 'en',
  licenseKey: 'd3hDOUpDRXZQa3ZnRzhpdE1pWFpFYzJ2R1dvdENHd2ZmQWtkcWRDelRVVlR1TU5TY0RRdm9CZ05rK0dmcEVxeFZYOWNSc1E9LU1qQXlNekV4TURnPQ==',
  toolbar: {
    viewportBottonOffset: 100,
    items: toolbarClassicEditor
  },
  heading: headingConfig,
  image: imageConfig,
  table: tableConfig,
  mediaEmbed: mediaEmbedConfig,
  indentBlock: indentBlockConfig,
  ckfinder: ckfinderConfig,
  sourceEditing: sourceEditingConfig,
  EasyImage:sourceEasyImage,
  htmlSupport: {
    allow: [
      // Start by allowing all elements, styles, classes, and attributes.
      {
          name: /.*/,
          styles: true,
          classes: true,
          attributes: true
      }
    ],
    disallow: [
      // Disallow <script> tags entirely.
      {
          name: 'script'
      },
      // Disallow any inline JavaScript event handlers.
      {
          name: /.*/,
          attributes: [/^on/]
      },
      // Disallow <iframe> tags (since they can be used to embed harmful content).
      {
          name: 'iframe'
      },
      // If you identify any other potentially harmful tags, disallow them here.
    ]
  },
  link: {
    // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
    addTargetToExternalLinks: true,

    // Let the users control the "download" attribute of each link.
    decorators: [
        {
            mode: 'manual',
            label: 'Open in a new tab',
            attributes: {
              target: '_blank',
              rel: 'noopener noreferrer'
            }
        }
    ]
  },
  template: {
    definitions: [
      // Cover - Image left
      {
        title: 'Cover - Image left',
        data: `
          <div class="container bg-lightgrey cover-left">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 p-0">
                  <div class="img-fluid cover-image">
                    <img src="/graphic/placeholder.jpg" alt="Cover Image">
                  </div>
                </div>
                <div class="col-12 col-lg-6 text-center p-4 p-lg-0">
                    <h3 class="ql-cover__heading">Heading</h3>
                    <p class="ql-cover__text">Description</p>
                    <a href="#" class="btn btn-primary">Update Link<span contenteditable="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#11BBB4"/></svg></span></a>
                </div>
            </div>
          </div>
        `,
        description: 'Cover layout with image on the left.'
      },
      // Cover - Image right
      {
        title: 'Cover - Image right',
        data: `
          <div class="container bg-lightgrey cover-right">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 text-center p-4 p-lg-0 order-lg-1 order-2">
                    <h3 class="ql-cover__heading">Heading</h3>
                    <p class="ql-cover__text">Description</p>
                    <a href="#" class="btn btn-primary">Update Link<span contenteditable="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#11BBB4"/></svg></span></a>
                </div>
                <div class="col-12 col-lg-6 p-0  order-lg-2 order-1">
                  <div class="img-fluid cover-image">
                    <img src="/graphic/placeholder.jpg" alt="Cover Image">
                  </div>
                </div>
            </div>
          </div>
        `,
        description: 'Cover layout with image on the right.'
      },
      // Tile - Image left
      {
        title: 'Tile - Image left',
        data: `
          <div class="container bg-lightgrey tile-left">
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 p-0">
                  <div class="img-fluid tile-image">
                    <img src="/graphic/placeholder.jpg" alt="Tile Image" class="img-fluid tile-image">
                  </div>
                </div>
                <div class="col-12 col-lg-9 p-4 pl-lg-5 pl-2">
                    <h3 class="text-left">Heading</h3>
                    <p class="main__content-intro">Subheading</p>
                    <p>Description</p>
                </div>
            </div>
          </div>
        `,
        description: 'Tile layout with image on the left.'
      },
      // Tile - Image right
      {
        title: 'Tile - Image right',
        data: `
          <div class="container bg-lightgrey tile-right">
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-9 p-4 pl-lg-5 pl-2 order-lg-1 order-2">
                    <h3 class="text-left">Heading</h3>
                    <p class="main__content-intro">Subheading</p>
                    <p>Description</p>
                </div>
                <div class="col-12 col-lg-3 p-0 order-lg-2 order-1">
                  <div class="img-fluid tile-image">
                    <img src="/graphic/placeholder.jpg" alt="Tile Image" class="img-fluid tile-image">
                  </div>
                </div>
            </div>
          </div>
        `,
        description: 'Tile layout with image on the right.'
      },
      // Inspire Button Primary
      {
        title: 'Button - Primary',
        data: `<a href="#" class="btn btn-primary">Update Link<span contenteditable="false"><svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2"> <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/></svg></span></a>`,
        description: 'Primary button template.'
      },
      // Inspire Button Secondary
      {
          title: 'Button - Secondary',
          data: `<a href="#" class="btn inspireButtonSecondary">Update Link<span contenteditable="false"><svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/></svg></span></a>`,
          description: 'Secondary button template.'
      },
      {
        title: ' Button - Primary + Secondary',
        data: `<div class="row no-gutters">
                <div class="col-12 col-lg-2 card__cta p-0 pt-3 text-center text-lg-left">
                  <a href="#" class="btn btn-primary">Update Link<span contenteditable="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
                      </svg>
                    </span>
                  </a>
                </div>
                <div class="col-12 col-lg-3 card__cta p-0 pt-3 text-center text-lg-left pl-lg-3">
                  <a href="#" class="btn inspireButtonSecondary">Update Link<span contenteditable="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
                      </svg>
                    </span>
                  </a>
                </div>
              </div>`,
        description: 'Primary and Secondary button template.'
      }
        // You can add more templates here
    ]
  },
};

/* DEFINE CLASSIC EDITOR - Text */

class TextEditor extends ClassicEditorBase {

}

TextEditor.builtinPlugins = plugins;

const toolbarTextEditor = [
  'heading', '|',
  'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'fontColor', '|',      
  'link','|',
  'removeFormat', '|',
  'sourceEditing', '|',
  'CKBox', 'CodeBlock', 'horizontalLine',
  'highlight',
  'fontSize',
  'fontFamily',
  'fontColor',
  'fontBackgroundColor',
  'easyimage', '|',
  'undo', 'redo'
];

TextEditor.defaultConfig = {
  language: 'en',
  licenseKey: 'dHhoV1gzUWh6TzZlQzhiSnJWRmNZOHhHdzRiQWx5SmpMU09GMk1pZVo0ZjBhQmhJQng4czJJZDF4M0VJVnZUZVpIWT0tTWpBeU16RXhNRGc9',
  toolbar: {
    viewportBottonOffset: 100,
    items: toolbarTextEditor
  },
  heading: headingConfig,
  sourceEditing: sourceEditingConfig,
};

/* DEFINE INLINE EDITOR */
class InlineEditor extends InlineEditorBase {
  
}

InlineEditor.builtinPlugins = plugins;

const toolbarInlineEditor = [
  'heading', '|',
  'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'fontColor', '|',      
  'blockQuote','link', 'bulletedList', 'numberedList', 'outdent', 'indent', '|',
  'ckfinder', 'insertTable', '|',
  'removeFormat', '|',
  'sourceEditing', '|',
  'CKBox', 'CodeBlock', 'horizontalLine',
  'highlight',
  'fontSize',
  'fontFamily',
  'fontColor',
  'fontBackgroundColor',
  'easyimage', '|',
  'undo', 'redo'
];

InlineEditor.defaultConfig = {
  language: 'en',
  licenseKey: 'dHhoV1gzUWh6TzZlQzhiSnJWRmNZOHhHdzRiQWx5SmpMU09GMk1pZVo0ZjBhQmhJQng4czJJZDF4M0VJVnZUZVpIWT0tTWpBeU16RXhNRGc9',
  toolbar: {
    viewportBottonOffset: 100,
    items: toolbarInlineEditor
  },
  heading: headingConfig,
  image: imageConfig,
  table: tableConfig,
  mediaEmbed: mediaEmbedConfig,
  indentBlock: indentBlockConfig,
  ckfinder: ckfinderConfig,
  sourceEditing: sourceEditingConfig,
};

/* DEFINE EMAIL EDITOR */

class EmailEditor extends ClassicEditorBase {
  
}

const toolbarEmailEditor = [
  'heading', '|','placeholder', '|',
  'bold', 'italic', 'underline', 'strikethrough', 'alignment','|',      
  'link', 'bulletedList', 'numberedList', '|',
  'removeFormat', '|',
  'sourceEditing', '|',
  'CKBox', 'CodeBlock', 'horizontalLine',
  'highlight',
  'fontSize',
  'fontFamily',
  'fontColor',
  'fontBackgroundColor',
  'easyimage', '|',
  'undo', 'redo'
];

EmailEditor.builtinPlugins = plugins;
EmailEditor.defaultConfig =  {
  licenseKey: 'dHhoV1gzUWh6TzZlQzhiSnJWRmNZOHhHdzRiQWx5SmpMU09GMk1pZVo0ZjBhQmhJQng4czJJZDF4M0VJVnZUZVpIWT0tTWpBeU16RXhNRGc9',
  language: 'en',
  toolbar: {
    viewportBottonOffset: 100,
    items: toolbarEmailEditor
  },
  heading: headingConfigEmail,
  sourceEditing: sourceEditingConfig,
};

export default {
  ClassicEditor, InlineEditor, EmailEditor, TextEditor
};