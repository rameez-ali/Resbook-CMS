import CKEDITOR  from '../src/ckeditor.js';
import {fontColorConfig, placeholderTags}  from './config.js';

export default class App {

  constructor(opts) {
    this.config = {
      gridHolder: '#grid-holder', 
      triggerBtn: '.add-row',
      numColumns: '#column-num',
      maxCols: 12
    }

    this.instances = {};

    this.config = $.extend(true, this.config, opts);

    this.enableCKInline($('.editable-column-editor'));
    this.enableCKClassic($('.content-editor'));
    this.enableCKClassicEmail($('.content-editor-email'));
    this.enableCKClassicText($('.content-editor-text'));
    
    this.buildGridContent();
    this.makeSortable('.grid-holder, .grid-holder > .row');
    this.removeCol('.remove-col');
    this.mergeCols('.col-merge');
    
  }
  enableCKClassic(elms){
    let ths = this;
    elms.each(function(i, elm) {
      let $elm = $(elm); // Wrapping with jQuery

      // Check if the element has a 'data-ref' attribute. If yes, use it; otherwise, use the 'id' attribute.
      var textareaSel = $elm.data('ref') ? $elm.data('ref') : $elm.attr('id');
  
      CKEDITOR.ClassicEditor
      .create(elm, {
        fontColor: {
          colors: fontColorConfig
        },
      })
      .then( editor => {
        ths.instances[textareaSel] = editor;

        // Listen to editor changes and update textarea content accordingly
        editor.model.document.on('change', () => {
          $('#' + textareaSel).val(editor.getData());
        });
      });
    });
}

  enableCKInline(elms) {
    let ths = this;
    elms.each(function(i, col) {
      let $col = $(col);
      let textareaSel = $col.data('ref');
      CKEDITOR.InlineEditor
      .create(col, {
        autosave: {
          save(editor) {
            $('#'+textareaSel).val(editor.getData());
          }
        },
        fontColor: {
          colors: fontColorConfig
        },
        link: {
          decorators: {
            openInNewTab: {
              mode: 'manual',
              label: 'Open in a new tab',
              defaultValue: true,	
              attributes: {
                  target: '_blank',
                  rel: 'noopener noreferrer'
              }
          }
          }
      }
      })
      .then( editor => {
        ths.instances[textareaSel] = editor;
      })
    });
  }

  enableCKClassicEmail(elms){
    let ths = this;
   
    elms.each(function(i, elm) {
      let $elm = $(elm);
      var textareaSel = $(elm).attr('id'),
          elmDataTags = ($(elm).data("tags") !== undefined) ? $(elm).data("tags") :  'default',
          defaultTags = placeholderTags[elmDataTags];
          
      CKEDITOR.EmailEditor
      .create(elm, {
        placeholderProps: {
          types: defaultTags
        },
      })
      .then( editor => {
        ths.instances[textareaSel] = editor;
      })
    });
  }

  enableCKClassicText(elms){
    let ths = this;
    elms.each(function(i, elm) {
      let $elm = $(elm);
      var textareaSel = $(elm).attr('id');
  
      CKEDITOR.TextEditor
      .create(elm, {
        fontColor: {
          colors: fontColorConfig
        },
      })
      .then( editor => {
        ths.instances[textareaSel] = editor;
      })
    });
  }

  pad(number, length) {
    let str = '' + number;
    while (str.length < length) {
      str = '0' + str;
    }
    return str;
  }

  processTemplate(tmpl, data, isHtml) {
    const newTmpl = ( isHtml ) ? tmpl : $(tmpl).html();
    const _tmpl = _.template(newTmpl);
    return _tmpl(data);
  }

  updateColSpan(rowToUpdate) {
    if (rowToUpdate.length) {
      let cols      = rowToUpdate.find('.res-col');
      let totalCols = cols.size();
      let maxCols   = this.getConfigItem('maxCols');

      if (maxCols) {
        let colCls = 'col-xs-12 col-12 res-col sortable-item'; 
        colCls = colCls+' col-sm-'+(maxCols/2);
        colCls = colCls+' col-md-'+(maxCols/totalCols);
        cols.attr('class', colCls);
        rowToUpdate.find('.col-cls').val(colCls);
      }

      // $('.grid-holder, .grid-holder > .row').sortable('refresh');
    }
  }

  buildGridContent() {
    const ths = this;
    const template = ths.getConfigItem('templates').contentRow;

    $(document).on('click', ths.getConfigItem('triggerBtn'), function(e) {
        e.preventDefault();

        const $self = $(this);
        const numColumns = parseInt($self.siblings('.column-num').val());
        const maxCols = ths.getConfigItem('maxCols');

        if (!numColumns) numColumns = 1;

        let gridHolder = $($self.data('append-to'));

        if (gridHolder.length == 0) {
            gridHolder = $(ths.getConfigItem('gridHolder'));
        }

        const prefix = (gridHolder.data('prefix')) ? gridHolder.data('prefix') + '-' : '';

        if (template && typeof template != 'undefined') {

            const rows = gridHolder.find('div[id^="row-"]');
            let rowIndex = rows.length;
            let rowInd;

            if (rowIndex > 0) {
                const lastRowId = rows.last().attr('id').replace("row-", "");
                rowInd = parseInt(lastRowId) + 1;
            } else {
                rowInd = 1; // start with 1 if no rows exist (or 0 if you want to start with 0)
            }

            var _compiledTmpl = ths.processTemplate(
                template, {
                    prefix: prefix,
                    rowInd: rowInd,
                    rowIndex: rowIndex,
                    numColumns: numColumns,
                    colIndex: '',
                    colCls: '',
                    i: 1,
                    maxCols: maxCols,
                },
                true
            );

            gridHolder.append(_compiledTmpl);

            let recentRow = gridHolder.find('div[id^="row-"]:last');

            let newCols = recentRow.find('.editable-column-content .content-editor');

            ths.enableCKClassic(newCols);

            $('.grid-holder').sortable('refresh');

            ths.makeSortable(recentRow);
        }

    });

    return false;
  }

  mergeCols(triggerElm) {
    var ths = this;
    $(document).on('change', triggerElm, function(){

      const $self = $(this);

      let row         = $self.parents('.row');
      let checkedBoxs = row.find(triggerElm).filter(':checked');

      if (checkedBoxs.length === 2) {
        var col1 = checkedBoxs.first().parents('.res-col'),
          col2 = checkedBoxs.last().parents('.res-col'),
          col1Cls = col1.attr('class'),
          col2Cls = col2.attr('class'),
          textarea1 = col1.find('textarea'),
          textarea2 = col2.find('textarea'),
          contentInstance1 = ths.instances[textarea1.attr('id')],
          contentInstance2 = ths.instances[textarea2.attr('id')],
          data1 = contentInstance1.getData(),
          data2 = contentInstance2.getData(),
          newData = data1+data2;

          var col1ClsArr = _.toArray(col1Cls.match(/\d+/g)).map(Number),
          col2ClsArr = $.makeArray(col2Cls.match(/\d+/g)).map(Number),
          col1Min =  _.min(col1ClsArr),
          col2Min = _.min(col2ClsArr),
          newCls = 'col-xs-12 col-12 col-sm-6 col-md-'+(col1Min+col2Min);
        
          col2.remove();
          col1.attr('class', (newCls+' res-col sortable-item'));
          col1.find('.col-cls').val(newCls);
          contentInstance1.setData(newData);
          checkedBoxs.attr('checked', false);
      } else if(checkedBoxs.length > 2) {
        triggerElm.not($self).attr('checked', false);
      }
    });

  }

  addColInRow() {
    var ths = this;
    $(document).on('click', '.add-col', function(e){
      e.preventDefault();

      var numColumns = 1,
        $self = $(this),
        $pRow = $self.parents('.row'),
        rowInex = ($pRow.index() - 1);
       
      if (numColumns) {
        var template = $(ths.getConfigItem('rowTemplate'));

        if (template.length) {
          var processedTempl = ths.processTemplate(
            ths.getConfigItem('rowTemplate'), {
              rowIndex: rowInex, 
              numColumns: numColumns, 
              colIndex: ($pRow.find('.res-col').size() + 1)
            }
          );
          
          var newCol = processedTempl.find('.res-col');
            $pRow.find('.res-col:last').after(newCol);
            ths.updateColSpan($pRow);

          var newCols = newCol.find('.editable-column-content .content-editor');

          ths.enableCKClassic(newCols);

          ths.makeSortable('#row-'+rowInex);
          ths.mergeCols($('#row-'+rowInex).find('.col-merge'));
        }
      }
    });
  }

  removeCol(elm) {

    const ths  = this;

    $(document).on('click', elm, function(e){
      e.preventDefault();

      const $self = $(this);
      const $parent = $self.parents('.row');
      const toRemove = $self.data('to-remove');
      const checkpoint = confirm('Are you sure you want to remove this section?');

      if (checkpoint) {
        if ($parent.find(toRemove).length > 1) {
          $self.parents(toRemove).remove();
          ths.updateColSpan($parent);
        } else {
          $parent.remove();
        }
      }

    });
  }

  updateItemNumber() {

    let $rows = $('#grid-holder .row.sortable-item');

    $rows.each(function(i, row){
      let $row = $(row);

      $row.attr('id', 'row-'+i);

    });

    $('.grid-holder, .grid-holder > .row').sortable('refresh');
  }

  makeSortable($elm) {
    const ths = this;

    if (typeof $elm === 'string') {
      $elm = $($elm);
    }

    $elm.sortable({
      placeholder: 'placeholder',
      handle: '.move-col',
      items: '> .sortable-item',
      helper: "clone",
      opacity: 0.6,
      appendTo: 'body',
      forcePlaceholderSize: true,
      start: function(e, ui) {
        ui.placeholder
        .css({
          padding: 0, 
          margin: 0, 
          borderRadius: 0
        })
        .height(ui.item.height()).width(ui.item.width())
        .css({
          marginBottom: ui.item.css('margin-bottom')
        });

        $(this).find('div.sortable-item:visible:first').addClass('real-first-child');
      }, 
      stop: function(event, ui) {
        $(this).find('div.real-first-child').removeClass('real-first-child');
      },
      change: function(event, ui) {
        $(this).find('div.real-first-child').removeClass('real-first-child');
        $(this).find('div.sortable-item:visible:first').addClass('real-first-child');
      },
      update: function(event, ui) {

        const sortableRows = $('.row.sortable-item');

        _.each(sortableRows, function(row, i){
          let $row = $(row);
          let $cols = $row.find('.col-xs-12');
          let rank  = (i+1);
          
          $row.find('.row-rank').val(rank);
          $row.find('[name="row-index[]"]').val(i);

          $cols.each(function(j, col){
            let $col = $(col);
            let colRank = (j+1);
            console.log(col);
            $col.find('.ckinline-textarea').attr({
              'name': 'content-' + i + '-text[]'
            });

            $col.find('.col-rank').attr({
              'name': 'content-' + i + '-rank[]'
            }).val(colRank);

            $col.find('.col-cls').attr({
              'name': 'content-' + i + '-class[]'
            });
          })
        });

        $('#grid-holder').sortable('refresh');
        $('#grid-holder > .row.sortable-item').sortable('refresh');

        $('#grid-holder').sortable('refreshPositions');
        $('#grid-holder > .row.sortable-item').sortable('refreshPositions');
      }
    });
  }

  getConfigItem(prop) {
    return this.getVar(prop, this.config);
  }

  getVar(property, obj) {
    if (property && typeof obj === 'object') {
      for (let prop in obj) {
        if (prop === property) {
          return obj[property];
        } else if(typeof obj[prop] === 'object') {
          return this.getVar(property, obj[prop]);
        }
      }
    }

    return false;
  }
  
  setConfigItem(prop, value) {
    this.config[prop] = value;
  }
  
}