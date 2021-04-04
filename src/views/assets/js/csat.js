(function ($) {
  'use strict';
  jQuery.noConflict(true);


    var path      = $('input[name="basepath"]').val() || '';
    var root      = $('input[name="rootpath"]').val() || '';
    var test      = $('input[name="path"]').val() || '';
    var minutes   = $('input[name="minutes"]').val();
    var enabled   = $('input[name="enabled"]').val();
    var curr_url  = window.location.href;
    var allow     = $('input[name="allow"]').val();
    var allow_arr = [];
    var deny      = $('input[name="deny"]').val();
    var deny_arr  = [];
    
    // if(allow      !== "") allow_arr = allow.split(/\r?\n/);
    // if(deny       !== "") deny_arr  = deny.split(/\r?\n/);
    // var isallow   = match_string(curr_url, allow_arr);
    // var isdeny    = match_string(curr_url, deny_arr);
    
    var isallow   = '';
    var isdeny  =''

    let wrap = document.createElement('div');
    wrap.setAttribute('class', 'text-muted');
    // wrap.innerHTML = '<input type="hidden" name="feel" value="" /><button onclick="reply(\'terrible\')" type="button" value="terrible" class="btn feel"><img src="'+path+'/img/default/survey/1 - terrible.svg" alt="Terrible" data-imgid="1" /></button><button onclick="reply(\'bad\')" type="button" value="bad" class="btn feel"><img src="'+path+'/img/default/survey/2 - bad.svg" alt="Bad" data-imgid="2" /></button><button onclick="reply(\'okay\')" type="button" value="okay" class="btn feel"><img src="'+path+'/img/default/survey/3 - okay.svg" alt="Okay" data-imgid="3" /></button><button onclick="reply(\'good\')" type="button" value="good" class="btn feel"><img src="'+path+'/img/default/survey/4 - good.svg" alt="Good" data-imgid="4"/></button><button onclick="reply(\'excellent\')" type="button" value="excellent" class="btn feel"><img src="'+path+'/img/default/survey/5 - excellent.svg" alt="Good" data-imgid="5" /></button><div class="mt-3 text-left"><label>Feedback <span class="text-muted">- (Optional)</span></label><textarea name="feedback" class="form-control" placeholder="Please give your feedback"></textarea></div>'
    wrap.innerHTML = '<input type="hidden" name="feel" value="" /><button type="button" value="terrible" class="btn feel"><img src="'+path+'/img/default/survey/1 - terrible.svg" alt="Terrible" data-imgid="1" /></button><button type="button" value="bad" class="btn feel"><img src="'+path+'/img/default/survey/2 - bad.svg" alt="Bad" data-imgid="2" /></button><button type="button" value="okay" class="btn feel"><img src="'+path+'/img/default/survey/3 - okay.svg" alt="Okay" data-imgid="3" /></button><button type="button" value="good" class="btn feel"><img src="'+path+'/img/default/survey/4 - good.svg" alt="Good" data-imgid="4"/></button><button type="button" value="excellent" class="btn feel"><img src="'+path+'/img/default/survey/5 - excellent.svg" alt="Good" data-imgid="5" /></button><div class="mt-3 text-left"><label>Feedback <span class="text-muted">- (Optional)</span></label><textarea name="feedback" class="form-control" placeholder="Please give your feedback" maxlength="200" rows="3"></textarea></div>';

    //change question
    var question = $('input[name="question"]').val();
    if(question == '') question = 'How was your overall experience while using the application?';

    //timer for open csat survey
    if(enabled == true)
    {
      if(!(isdeny > 0 && isallow < 1))
      {
        if(!isNaN(minutes))
        {
          minutes   = parseInt(minutes);
          if(minutes > 0)
          {        
            var timer = 0;
            timer     = (minutes * 60) * 1000
            setTimeout(function(){ swal_open(question, wrap); }, timer);
          }
        }      
      }
    }

    //csat icon click
    $('.sweet-csat').on('click', function(e){
      e.preventDefault();      
      swal_open(question, wrap);      
      
    });

    //on type comment
    // $('textarea[name=comment]').on('keyup keypress',function() 
    $(document).on('keyup', 'textarea[name="feedback"]', function()
    {
      //console.log('here');
      var maxlen = 200;
      var length = $(this).val().length;
      if(length > (maxlen-10) )
      {
        if($('.error-msg').length < 1)
          $(this).after('<label class="error-msg">Max length '+maxlen+' characters only! Length is '+length+'.</label>');
        else
          $('.error-msg').html('Max length '+maxlen+' characters only! Length is '+length+'.');
      }
      else $('.error-msg').remove();
    });

    //choosing rating
    $(document).on('click', ".feel", function(){
      var feel = $(this).attr('value');
      var feel_val = 0;
      switch(feel){
        case 'terrible':
            feel_val = 1;
            break;
        case 'bad':
            feel_val = 2;
            break;
        case 'okay':
            feel_val = 3;
            break;
        case 'good':
            feel_val = 4;
            break;
        case 'excellent':
            feel_val = 5;
            break;
      }

      for(var i = 1; i<=5; i++ ){
        var src = $('img[data-imgid="'+i+'"]').attr('src');
        var b= '-gry'; 
        if(i != feel_val){
          var position = -4;
          var output = [src.slice(0, position), b, src.slice(position)].join(''); 
          if(src.search(b) < 0){
            $('img[data-imgid="'+i+'"]').attr('src', output);
          }
        }else{ 
          if(src.search(b) > 0){  
            var output = src.replace(b, "");
            $('img[data-imgid="'+i+'"]').attr('src', output);
          }
        }
      }

      if(feel_val){
        $('input[name="feel"]').val(feel_val);
      }

      $('.swal-button.swal-button--confirm').removeAttr('disabled');
    
    });

    //match string in array
    function match_string(str1, list)
    {
      var list2   = '';
      var ismatch  = 0;

      if(list.length > 0)
      {
        for (var i = 0; i < list.length; i++) 
        {
          var all = list[i].indexOf("*");
          if(all >= 0) //with wildcard
          {
            list2 = list[i].replace("*", " ");
            list2 = list2.trim();
            if (str1.search(list2.trim()) >= 0) ismatch = 1;
          }
          else
          {
            list2 = list[i].trim();
            if (str1.search(list2.trim()) >= 0) ismatch = 1;
          }
        }

      }
      // else ismatch = 1;

      return ismatch;
    }

    //open csat survey
    function swal_open(question, wrap)
    {
      swal({
          title: question,
          // text: "",
          // icon: "info",
          className: 'swal-logout',
          closeOnClickOutside: false,
          content: {
            element: wrap
          },
          buttons: {
            cancel: {
              text: "Close",
              value: 'close',
              visible: true,
              className: "btn btn-secondary",
              closeModal: true,
            },
            confirm: {
              text: "Submit",
              value: 'submit_exp',
              visible: true, 
              className: "btn btn-primary", 
              closeModal: true,
            },
          }
      }).then(function (value) {
        
          if (value === 'close') {
            // window.location.reload();
            // swal("You are now logged out. Thank you for using the app!", {
            //   icon: "success",
            // });
            // setTimeout(function() { window.location.href = app_url_logout; }, 2000);
          }else if(value === 'submit_exp'){
            // alert($('input[name=feel]').val());
            if($('input[name=feel]').val()){
                // console.log('submit')
                submit_exp(); 
            }else{ 
                $('.swal-content').append('<p class="col-12 mt-4 text-danger small">Please select from the smileys.</p>');
            }
          }  
      });

      //change csat survey bgcolor
      var bgcolor = $('input[name="bgcolor"]').val();
      if(bgcolor !== '') $('.swal-modal').css('background', bgcolor);

      //position csat survey
      var align = $('input[name="align"]').val();
      if(align !== '') $('.swal-modal').css(align, 0);
      
      $('.swal-button.swal-button--confirm').attr('disabled', 'disabled');
    }

    //submit csat survey
    function submit_exp()
    {
      var feel_val = $('input[name="feel"]').val();
      var feedback_val = $('textarea[name="feedback"]').val();
      if(feel_val)
        { 
          // var csrf_val = $('meta[name="csrf-token"]').attr('content');
          $.ajax({ 
            // headers: {
            //     'X-CSRF-TOKEN': csrf_val},
             url : test+'csat/submit', 
             type : "POST",  
             data : {'rate':feel_val, 'feedback':feedback_val },
             dataType: "json",
             success:function(data)
             { 
                var message = $('input[name="message"]').val();
                if(message !== '') swal(message, '', "success");
                else swal('Thanks for your rating!', '', "success");
                
                setTimeout(function() { window.location.reload(); }, 1000);

             }, 
          });
       }
      
    }

    //reports datatable
    if($('#reports_table').length > 0)
    {
      if ( ! $.fn.DataTable.isDataTable( '#reports_table' ) ) 
      {
        $('#reports_table').DataTable().destroy();
        $('#reports_table').DataTable({
          responsive:  {
            details: {
                type: 'column'
            }
          },
          columns: [
              {
                  responsivePriority  : 5,
                  width               : "10%"
              },
              {
                  responsivePriority  : 1,
                  width               : "20%"
              },
              {
                  responsivePriority  : 3,
                  width               : "20%"
              },
              {
                  responsivePriority  : 2,
                  width               : "30%"
              },
              {
                  responsivePriority  : 4,
                  width               : "20%"
              }
          ],
          columnDefs: [
            {
              className: 'control',
              orderable: false,
              targets:   0,

            },
            {
              className: 'wrap-text',
              targets:   2,

            }
          ],
          autoWidth: true,  
          dom: '<"dt-buttons"B>lfrtip',
          buttons: [
            {
                extend: 'excelHtml5',
                title : 'Customer Satisfaction Report'
            },
            {
                extend: 'csvHtml5',
                title : 'Customer Satisfaction Report'
            },
            {
                extend: 'pdfHtml5',
                // orientation: 'landscape',
                // pageSize: 'LEGAL',
                title : 'Customer Satisfaction Report',
                customize: function (doc) {
                  // doc.content[1].table.widths = 
                  //     Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            }   
          ]
        });
      }
    }
    //reports datatable
    
})(jQuery);
