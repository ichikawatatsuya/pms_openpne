var IframeModalBox=Class.create(); IframeModalBox.prototype={modal:null,modalContents:null,modalIframe:null,closeCallback:null,initialize:function(a){this.modal=$(a);this.modalContents=$(a+"_contents");this.modalIframe=this.modalContents.getElementsByTagName("iframe")[0]},open:function(a,b){this.closeCallback=null;if(b)this.closeCallback=b;this.modalContents.setStyle(getCenterMuchScreen(this.modalContents));this.modalIframe.src=a;new Effect.Appear(this.modal,{from:0,to:0.7});new Effect.Appear(this.modalContents,{from:0,to:1})},close:function(a){Element.hide(this.modal); Element.hide(this.modalContents);this.closeCallback&&this.closeCallback(a);this.clear()},clear:function(){var a=this.modalIframe.contentDocument||this.modalIframe.contentWindow.document;a.open();a.close()}};