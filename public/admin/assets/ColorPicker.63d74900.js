import{J as F,aq as I,R as n,ar as v,as as S,at as y,au as M,av as k,aw as P,ax as u,ay as A,az as B,aA as D,aB as f,aC as U,aD as R,aE as H}from"./index.36e488d1.js";var z=function(C){F(o,C);function o(t){var e=C.call(this,t)||this;return e.state={isOpened:!1,isFocused:!1,inputValue:e.props.value||""},e.open=e.open.bind(e),e.close=e.close.bind(e),e.focus=e.focus.bind(e),e.blur=e.blur.bind(e),e.handleChange=e.handleChange.bind(e),e.handleFocus=e.handleFocus.bind(e),e.handleBlur=e.handleBlur.bind(e),e.clearValue=e.clearValue.bind(e),e.handleInputChange=e.handleInputChange.bind(e),e.handleClick=e.handleClick.bind(e),e.preview=n.createRef(),e.input=n.createRef(),e}return o.prototype.componentDidUpdate=function(t){var e=this.props;t.value!==e.value&&this.setState({inputValue:e.value||""})},o.prototype.handleFocus=function(){this.setState({isFocused:!0})},o.prototype.handleBlur=function(){this.setState({isFocused:!1,inputValue:this.props.value})},o.prototype.focus=function(){this.input.current&&this.input.current.focus()},o.prototype.blur=function(){this.input.current&&this.input.current.blur()},o.prototype.open=function(t){this.props.disabled||this.setState({isOpened:!0},t)},o.prototype.close=function(){this.setState({isOpened:!1})},o.prototype.clearValue=function(){var t=this.props,e=t.onChange,r=t.resetValue;e(r||"")},o.prototype.handleClick=function(){this.state.isOpened?this.close():this.open(this.focus)},o.prototype.handleInputChange=function(t){var e=this;if(!!this.props.allowCustomColor){var r=this.props.onChange;this.setState({inputValue:t.currentTarget.value},function(){var l=e.validateColor(e.state.inputValue);l&&r(e.state.inputValue)})}},o.prototype.validateColor=function(t){if(t===""||t==="inherit"||t==="transparent")return!1;var e=document.createElement("img");return e.style.color="rgb(0, 0, 0)",e.style.color=t,e.style.color!=="rgb(0, 0, 0)"?!0:(e.style.color="rgb(255, 255, 255)",e.style.color=t,e.style.color!=="rgb(255, 255, 255)")},o.prototype.handleChange=function(t){var e=this.props,r=e.onChange,l=e.format;r(l==="rgba"?"rgba(".concat(t.rgb.r,", ").concat(t.rgb.g,", ").concat(t.rgb.b,", ").concat(t.rgb.a,")"):l==="rgb"?"rgb(".concat(t.rgb.r,", ").concat(t.rgb.g,", ").concat(t.rgb.b,")"):l==="hsl"?"hsl(".concat(Math.round(t.hsl.h),", ").concat(Math.round(t.hsl.s*100),"%, ").concat(Math.round(t.hsl.l*100),"%)"):t.hex)},o.prototype.render=function(){var t=this,e=this.props,r=e.classPrefix,l=e.className,E=e.popoverClassName,c=e.value,N=e.placeholder,p=e.disabled,g=e.popOverContainer,b=e.format,O=e.clearable,x=e.placement,s=e.classnames,i=e.presetColors,m=e.allowCustomColor,V=e.useMobileUI,_=this.props.translate,h=this.state.isOpened,w=this.state.isFocused,d=V&&I();return n.createElement("div",{className:s("ColorPicker",{"is-disabled":p,"is-focused":w,"is-opened":h},l)},n.createElement("span",{onClick:this.handleClick,className:s("ColorPicker-preview")},n.createElement("i",{ref:this.preview,className:"".concat(r,"ColorPicker-previewIcon"),style:{background:this.state.inputValue||"#ccc"}})),n.createElement("input",{ref:this.input,type:"text",autoComplete:"off",size:10,className:s("ColorPicker-input"),value:this.state.inputValue||"",placeholder:_(N),disabled:p,onChange:this.handleInputChange,onFocus:this.handleFocus,onBlur:this.handleBlur,onClick:this.handleClick,readOnly:d}),O&&!p&&c?n.createElement("a",{onClick:this.clearValue,className:s("ColorPicker-clear")},n.createElement(v,{icon:"input-clear",className:"icon"})):null,n.createElement("span",{className:s("ColorPicker-arrow")},n.createElement(v,{icon:"caret",className:"icon",onClick:this.handleClick})),!d&&h?n.createElement(S,{placement:x||"auto",target:function(){return y.exports.findDOMNode(t)},onHide:this.close,container:g||function(){return y.exports.findDOMNode(t)},rootClose:!1,show:!0},n.createElement(M,{classPrefix:r,className:s("ColorPicker-popover",E),onHide:this.close,overlay:!0},m?n.createElement(k,{styles:{},disableAlpha:!!~["rgb","hex"].indexOf(b),color:c,presetColors:i,onChangeComplete:this.handleChange}):n.createElement(P,{color:c,colors:Array.isArray(i)?i.filter(function(a){return typeof a=="string"||u(a)}).map(function(a){return typeof a=="string"?a:u(a)?a==null?void 0:a.color:a}):void 0,onChangeComplete:this.handleChange}))):null,d&&n.createElement(A,{className:s("".concat(r,"ColorPicker-popup")),container:g,isShow:h,onHide:this.handleClick},m?n.createElement(k,{styles:{},disableAlpha:!!~["rgb","hex"].indexOf(b),color:c,presetColors:i,onChangeComplete:this.handleChange}):n.createElement(P,{color:c,colors:Array.isArray(i)?i.filter(function(a){return typeof a=="string"||u(a)}).map(function(a){return typeof a=="string"?a:u(a)?a==null?void 0:a.color:a}):void 0,onChangeComplete:this.handleChange})))},o.defaultProps={format:"hex",clearable:!0,placeholder:"ColorPicker.placeholder",allowCustomColor:!0},B([D,f("design:type",Function),f("design:paramtypes",[String]),f("design:returntype",void 0)],o.prototype,"validateColor",null),o}(n.PureComponent),j=U(R(H(z,{value:"onChange"})));export{z as ColorControl,j as default};
