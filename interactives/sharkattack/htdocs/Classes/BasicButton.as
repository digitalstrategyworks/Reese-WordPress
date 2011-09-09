package Classes {
	
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	
	public class BasicButton extends Sprite {
		
		public function BasicButton() {
			//trace("BasicButtonCreated");
			
			this.buttonMode = true;
			this.mouseChildren = false;
			
			//add listeners
			this.addEventListener(MouseEvent.CLICK, click);
			this.addEventListener(MouseEvent.MOUSE_OVER, over);
			this.addEventListener(MouseEvent.MOUSE_OUT, out);
			
			
		}
		
		public function click(e:MouseEvent):void{
			//trace("BasicButtonClick");
		}
		
		public function out(e:MouseEvent):void{
			//trace("BasicButtonOut");
		}
		
		public function over(e:MouseEvent):void{
			//trace("BasicButtonOver");
		}
		
		
	}
	
}