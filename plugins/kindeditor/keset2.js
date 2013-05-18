			var editor;
			var id='reply_content';
			KindEditor.ready(function(K) {
				editor = K.create('#reply_content', {
					width : '100%',
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : true,
					items : [
						'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image','multiimage', 'link', '|','clearhtml','code'],

					afterCreate: function() { 
						var self = this;
						K.ctrl(document, 13, function() { 
						self.sync();
						  document.forms['add_new'].submit(); 
						});
						K.ctrl(self.edit.doc, 13, function() { 
						self.sync();
						document.forms['add_new'].submit();
						});
					},
					afterBlur:function(){this.sync();}

				});
                
        		});
        		
        		$("#mention_button").live('click',function(){
				var uname =$(this).attr('data-mention');
                editor.insertHtml('@'+uname+' ')
                });