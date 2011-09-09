﻿package Classes.Utilities{
	import flash.events.Event;
	
	public class CustomEvent extends Event {
		
		public var vars:Array;
		
		/**
		 * Custom Event for passing parameters along with dispatched events
		 * @type:String - event type for event listeners addEventListener(@type)
		 * @parameters:* - ... creates an array with all parameters type
		 **/
		public function CustomEvent(type:String, ... passedParam:*) {
			super(type, true);
			vars = passedParam;
		}
		
		public override function clone():Event {
			return new CustomEvent(type, vars);
		}
		
		public override function toString():String {
			return formatToString("CustomEvent","type","eventPhase","vars");
		}
	}
}