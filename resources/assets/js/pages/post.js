window.initPostPage = function(){           
            /**
            * add new comment
            */
       $('#submit-comment').click(function(event){
           var comment = $('#new-comment').val();
       
       $.ajax({
           url:window.routes.add_comment,
           type: 'POST',
           dataType: 'json',
           data:{ comment: comment },
           })
          .done(function(resp){
              if(resp.status == 'error'){
                  alert(resp.message);
              }else{  
                $('#comments-container').append('<div class="media">\
                        <div class="media-left media-middle">\
                            <img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=60">\
                         </div>\
                         <div class="media-body">\
                           <h4 class="media-heading">'+window.user.fullName+'</h4>\
                           <p>'+comment+'</p>\
                         </div>\
                      </div>');
                               
                      $('#comments-container .media').last().hide().slideDown('slow');
                      
                      $('#new-comment').val('');
              }
          })
          .fail(function(){
             alert('Failed to post you comment, please try later.'); 
          });
        });
          /**
           * delete comment
           */
          $('.delete-btn').click(function(event){
           var self = $(this);
           var comment_id = $(this).data('comment-id');
           
           $.ajax({
           url:window.routes.delete_comment,
           type: 'DELETE',
           dataType: 'json',
           data:{ comment_id: comment_id },
           })
          .done(function(resp){
              if(resp.status == 'error'){
                  alert(resp.message);
              }else{  
               self.closest('.media').slideUp('slow');
              }
          })
          .fail(function(){
             alert('Failed to delete comment, please try later.'); 
          });  
      });
};