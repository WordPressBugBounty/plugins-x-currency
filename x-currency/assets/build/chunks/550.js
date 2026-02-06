"use strict";(globalThis.webpackChunkx_currency=globalThis.webpackChunkx_currency||[]).push([[550],{4550:(e,t,n)=>{n.d(t,{A:()=>nn});var r=n(790),o=n(104),a=n(4902),i=n(6087),s=n(6427),c=n(1609),l=function(){return l=Object.assign||function(e){for(var t,n=1,r=arguments.length;n<r;n++)for(var o in t=arguments[n])Object.prototype.hasOwnProperty.call(t,o)&&(e[o]=t[o]);return e},l.apply(this,arguments)};function u(e,t,n){if(n||2===arguments.length)for(var r,o=0,a=t.length;o<a;o++)(r||!(o in t))&&(r||(r=Array.prototype.slice.call(t,0,o)),r[o]=t[o]);return e.concat(r||Array.prototype.slice.call(t))}var p="-ms-",d="-moz-",f="-webkit-",h="comm",g="rule",m="decl",v="@keyframes",y=Math.abs,x=String.fromCharCode,b=Object.assign;function w(e){return e.trim()}function S(e,t){return(e=t.exec(e))?e[0]:e}function _(e,t,n){return e.replace(t,n)}function C(e,t,n){return e.indexOf(t,n)}function A(e,t){return 0|e.charCodeAt(t)}function j(e,t,n){return e.slice(t,n)}function I(e){return e.length}function k(e){return e.length}function $(e,t){return t.push(e),e}function P(e,t){return e.filter(function(e){return!S(e,t)})}var R=1,E=1,N=0,O=0,z=0,D="";function T(e,t,n,r,o,a,i,s){return{value:e,root:t,parent:n,type:r,props:o,children:a,line:R,column:E,length:i,return:"",siblings:s}}function F(e,t){return b(T("",null,null,"",null,null,0,e.siblings),e,{length:-e.length},t)}function L(e){for(;e.root;)e=F(e.root,{children:[e]});$(e,e.siblings)}function G(){return z=O>0?A(D,--O):0,E--,10===z&&(E=1,R--),z}function B(){return z=O<N?A(D,O++):0,E++,10===z&&(E=1,R++),z}function W(){return A(D,O)}function M(){return O}function Y(e,t){return j(D,e,t)}function U(e){switch(e){case 0:case 9:case 10:case 13:case 32:return 5;case 33:case 43:case 44:case 47:case 62:case 64:case 126:case 59:case 123:case 125:return 4;case 58:return 3;case 34:case 39:case 40:case 91:return 2;case 41:case 93:return 1}return 0}function q(e){return w(Y(O-1,V(91===e?e+2:40===e?e+1:e)))}function H(e){for(;(z=W())&&z<33;)B();return U(e)>2||U(z)>3?"":" "}function Z(e,t){for(;--t&&B()&&!(z<48||z>102||z>57&&z<65||z>70&&z<97););return Y(e,M()+(t<6&&32==W()&&32==B()))}function V(e){for(;B();)switch(z){case e:return O;case 34:case 39:34!==e&&39!==e&&V(z);break;case 40:41===e&&V(e);break;case 92:B()}return O}function J(e,t){for(;B()&&e+z!==57&&(e+z!==84||47!==W()););return"/*"+Y(t,O-1)+"*"+x(47===e?e:B())}function K(e){for(;!U(W());)B();return Y(e,O)}function Q(e){return function(e){return D="",e}(X("",null,null,null,[""],e=function(e){return R=E=1,N=I(D=e),O=0,[]}(e),0,[0],e))}function X(e,t,n,r,o,a,i,s,c){for(var l=0,u=0,p=i,d=0,f=0,h=0,g=1,m=1,v=1,b=0,w="",S=o,j=a,k=r,P=w;m;)switch(h=b,b=B()){case 40:if(108!=h&&58==A(P,p-1)){-1!=C(P+=_(q(b),"&","&\f"),"&\f",y(l?s[l-1]:0))&&(v=-1);break}case 34:case 39:case 91:P+=q(b);break;case 9:case 10:case 13:case 32:P+=H(h);break;case 92:P+=Z(M()-1,7);continue;case 47:switch(W()){case 42:case 47:$(te(J(B(),M()),t,n,c),c);break;default:P+="/"}break;case 123*g:s[l++]=I(P)*v;case 125*g:case 59:case 0:switch(b){case 0:case 125:m=0;case 59+u:-1==v&&(P=_(P,/\f/g,"")),f>0&&I(P)-p&&$(f>32?ne(P+";",r,n,p-1,c):ne(_(P," ","")+";",r,n,p-2,c),c);break;case 59:P+=";";default:if($(k=ee(P,t,n,l,u,o,s,w,S=[],j=[],p,a),a),123===b)if(0===u)X(P,t,k,k,S,a,p,s,j);else switch(99===d&&110===A(P,3)?100:d){case 100:case 108:case 109:case 115:X(e,k,k,r&&$(ee(e,k,k,0,0,o,s,w,o,S=[],p,j),j),o,j,p,s,r?S:j);break;default:X(P,k,k,k,[""],j,0,s,j)}}l=u=f=0,g=v=1,w=P="",p=i;break;case 58:p=1+I(P),f=h;default:if(g<1)if(123==b)--g;else if(125==b&&0==g++&&125==G())continue;switch(P+=x(b),b*g){case 38:v=u>0?1:(P+="\f",-1);break;case 44:s[l++]=(I(P)-1)*v,v=1;break;case 64:45===W()&&(P+=q(B())),d=W(),u=p=I(w=P+=K(M())),b++;break;case 45:45===h&&2==I(P)&&(g=0)}}return a}function ee(e,t,n,r,o,a,i,s,c,l,u,p){for(var d=o-1,f=0===o?a:[""],h=k(f),m=0,v=0,x=0;m<r;++m)for(var b=0,S=j(e,d+1,d=y(v=i[m])),C=e;b<h;++b)(C=w(v>0?f[b]+" "+S:_(S,/&\f/g,f[b])))&&(c[x++]=C);return T(e,t,n,0===o?g:s,c,l,u,p)}function te(e,t,n,r){return T(e,t,n,h,x(z),j(e,2,-2),0,r)}function ne(e,t,n,r,o){return T(e,t,n,m,j(e,0,r),j(e,r+1,-1),r,o)}function re(e,t,n){switch(function(e,t){return 45^A(e,0)?(((t<<2^A(e,0))<<2^A(e,1))<<2^A(e,2))<<2^A(e,3):0}(e,t)){case 5103:return f+"print-"+e+e;case 5737:case 4201:case 3177:case 3433:case 1641:case 4457:case 2921:case 5572:case 6356:case 5844:case 3191:case 6645:case 3005:case 6391:case 5879:case 5623:case 6135:case 4599:case 4855:case 4215:case 6389:case 5109:case 5365:case 5621:case 3829:return f+e+e;case 4789:return d+e+e;case 5349:case 4246:case 4810:case 6968:case 2756:return f+e+d+e+p+e+e;case 5936:switch(A(e,t+11)){case 114:return f+e+p+_(e,/[svh]\w+-[tblr]{2}/,"tb")+e;case 108:return f+e+p+_(e,/[svh]\w+-[tblr]{2}/,"tb-rl")+e;case 45:return f+e+p+_(e,/[svh]\w+-[tblr]{2}/,"lr")+e}case 6828:case 4268:case 2903:return f+e+p+e+e;case 6165:return f+e+p+"flex-"+e+e;case 5187:return f+e+_(e,/(\w+).+(:[^]+)/,f+"box-$1$2"+p+"flex-$1$2")+e;case 5443:return f+e+p+"flex-item-"+_(e,/flex-|-self/g,"")+(S(e,/flex-|baseline/)?"":p+"grid-row-"+_(e,/flex-|-self/g,""))+e;case 4675:return f+e+p+"flex-line-pack"+_(e,/align-content|flex-|-self/g,"")+e;case 5548:return f+e+p+_(e,"shrink","negative")+e;case 5292:return f+e+p+_(e,"basis","preferred-size")+e;case 6060:return f+"box-"+_(e,"-grow","")+f+e+p+_(e,"grow","positive")+e;case 4554:return f+_(e,/([^-])(transform)/g,"$1"+f+"$2")+e;case 6187:return _(_(_(e,/(zoom-|grab)/,f+"$1"),/(image-set)/,f+"$1"),e,"")+e;case 5495:case 3959:return _(e,/(image-set\([^]*)/,f+"$1$`$1");case 4968:return _(_(e,/(.+:)(flex-)?(.*)/,f+"box-pack:$3"+p+"flex-pack:$3"),/s.+-b[^;]+/,"justify")+f+e+e;case 4200:if(!S(e,/flex-|baseline/))return p+"grid-column-align"+j(e,t)+e;break;case 2592:case 3360:return p+_(e,"template-","")+e;case 4384:case 3616:return n&&n.some(function(e,n){return t=n,S(e.props,/grid-\w+-end/)})?~C(e+(n=n[t].value),"span",0)?e:p+_(e,"-start","")+e+p+"grid-row-span:"+(~C(n,"span",0)?S(n,/\d+/):+S(n,/\d+/)-+S(e,/\d+/))+";":p+_(e,"-start","")+e;case 4896:case 4128:return n&&n.some(function(e){return S(e.props,/grid-\w+-start/)})?e:p+_(_(e,"-end","-span"),"span ","")+e;case 4095:case 3583:case 4068:case 2532:return _(e,/(.+)-inline(.+)/,f+"$1$2")+e;case 8116:case 7059:case 5753:case 5535:case 5445:case 5701:case 4933:case 4677:case 5533:case 5789:case 5021:case 4765:if(I(e)-1-t>6)switch(A(e,t+1)){case 109:if(45!==A(e,t+4))break;case 102:return _(e,/(.+:)(.+)-([^]+)/,"$1"+f+"$2-$3$1"+d+(108==A(e,t+3)?"$3":"$2-$3"))+e;case 115:return~C(e,"stretch",0)?re(_(e,"stretch","fill-available"),t,n)+e:e}break;case 5152:case 5920:return _(e,/(.+?):(\d+)(\s*\/\s*(span)?\s*(\d+))?(.*)/,function(t,n,r,o,a,i,s){return p+n+":"+r+s+(o?p+n+"-span:"+(a?i:+i-+r)+s:"")+e});case 4949:if(121===A(e,t+6))return _(e,":",":"+f)+e;break;case 6444:switch(A(e,45===A(e,14)?18:11)){case 120:return _(e,/(.+:)([^;\s!]+)(;|(\s+)?!.+)?/,"$1"+f+(45===A(e,14)?"inline-":"")+"box$3$1"+f+"$2$3$1"+p+"$2box$3")+e;case 100:return _(e,":",":"+p)+e}break;case 5719:case 2647:case 2135:case 3927:case 2391:return _(e,"scroll-","scroll-snap-")+e}return e}function oe(e,t){for(var n="",r=0;r<e.length;r++)n+=t(e[r],r,e,t)||"";return n}function ae(e,t,n,r){switch(e.type){case"@layer":if(e.children.length)break;case"@import":case m:return e.return=e.return||e.value;case h:return"";case v:return e.return=e.value+"{"+oe(e.children,r)+"}";case g:if(!I(e.value=e.props.join(",")))return""}return I(n=oe(e.children,r))?e.return=e.value+"{"+n+"}":""}function ie(e,t,n,r){if(e.length>-1&&!e.return)switch(e.type){case m:return void(e.return=re(e.value,e.length,n));case v:return oe([F(e,{value:_(e.value,"@","@"+f)})],r);case g:if(e.length)return function(e,t){return e.map(t).join("")}(n=e.props,function(t){switch(S(t,r=/(::plac\w+|:read-\w+)/)){case":read-only":case":read-write":L(F(e,{props:[_(t,/:(read-\w+)/,":-moz-$1")]})),L(F(e,{props:[t]})),b(e,{props:P(n,r)});break;case"::placeholder":L(F(e,{props:[_(t,/:(plac\w+)/,":"+f+"input-$1")]})),L(F(e,{props:[_(t,/:(plac\w+)/,":-moz-$1")]})),L(F(e,{props:[_(t,/:(plac\w+)/,p+"input-$1")]})),L(F(e,{props:[t]})),b(e,{props:P(n,r)})}return""})}}var se={animationIterationCount:1,aspectRatio:1,borderImageOutset:1,borderImageSlice:1,borderImageWidth:1,boxFlex:1,boxFlexGroup:1,boxOrdinalGroup:1,columnCount:1,columns:1,flex:1,flexGrow:1,flexPositive:1,flexShrink:1,flexNegative:1,flexOrder:1,gridRow:1,gridRowEnd:1,gridRowSpan:1,gridRowStart:1,gridColumn:1,gridColumnEnd:1,gridColumnSpan:1,gridColumnStart:1,msGridRow:1,msGridRowSpan:1,msGridColumn:1,msGridColumnSpan:1,fontWeight:1,lineHeight:1,opacity:1,order:1,orphans:1,tabSize:1,widows:1,zIndex:1,zoom:1,WebkitLineClamp:1,fillOpacity:1,floodOpacity:1,stopOpacity:1,strokeDasharray:1,strokeDashoffset:1,strokeMiterlimit:1,strokeOpacity:1,strokeWidth:1},ce=typeof process<"u"&&void 0!==process.env&&(process.env.REACT_APP_SC_ATTR||process.env.SC_ATTR)||"data-styled",le="active",ue="data-styled-version",pe="6.1.19",de="/*!sc*/\n",fe=typeof window<"u"&&typeof document<"u",_n=!!("boolean"==typeof SC_DISABLE_SPEEDY?SC_DISABLE_SPEEDY:typeof process<"u"&&void 0!==process.env&&void 0!==process.env.REACT_APP_SC_DISABLE_SPEEDY&&""!==process.env.REACT_APP_SC_DISABLE_SPEEDY?"false"!==process.env.REACT_APP_SC_DISABLE_SPEEDY&&process.env.REACT_APP_SC_DISABLE_SPEEDY:typeof process<"u"&&void 0!==process.env&&void 0!==process.env.SC_DISABLE_SPEEDY&&""!==process.env.SC_DISABLE_SPEEDY&&"false"!==process.env.SC_DISABLE_SPEEDY&&process.env.SC_DISABLE_SPEEDY),he=Object.freeze([]),ge=Object.freeze({}),me=new Set(["a","abbr","address","area","article","aside","audio","b","base","bdi","bdo","big","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","data","datalist","dd","del","details","dfn","dialog","div","dl","dt","em","embed","fieldset","figcaption","figure","footer","form","h1","h2","h3","h4","h5","h6","header","hgroup","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","main","map","mark","menu","menuitem","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","picture","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","span","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","tr","track","u","ul","use","var","video","wbr","circle","clipPath","defs","ellipse","foreignObject","g","image","line","linearGradient","marker","mask","path","pattern","polygon","polyline","radialGradient","rect","stop","svg","text","tspan"]),ve=/[!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~-]+/g,ye=/(^-|-$)/g;function xe(e){return e.replace(ve,"-").replace(ye,"")}var be=/(a)(d)/gi,we=function(e){return String.fromCharCode(e+(e>25?39:97))};function Se(e){var t,n="";for(t=Math.abs(e);t>52;t=t/52|0)n=we(t%52)+n;return(we(t%52)+n).replace(be,"$1-$2")}var _e,Ce=function(e,t){for(var n=t.length;n;)e=33*e^t.charCodeAt(--n);return e},Ae=function(e){return Ce(5381,e)};function je(e){return"string"==typeof e&&!0}var Ie="function"==typeof Symbol&&Symbol.for,ke=Ie?Symbol.for("react.memo"):60115,$e=Ie?Symbol.for("react.forward_ref"):60112,Pe={childContextTypes:!0,contextType:!0,contextTypes:!0,defaultProps:!0,displayName:!0,getDefaultProps:!0,getDerivedStateFromError:!0,getDerivedStateFromProps:!0,mixins:!0,propTypes:!0,type:!0},Re={name:!0,length:!0,prototype:!0,caller:!0,callee:!0,arguments:!0,arity:!0},Ee={$$typeof:!0,compare:!0,defaultProps:!0,displayName:!0,propTypes:!0,type:!0},Ne=((_e={})[$e]={$$typeof:!0,render:!0,defaultProps:!0,displayName:!0,propTypes:!0},_e[ke]=Ee,_e);function Oe(e){return("type"in(t=e)&&t.type.$$typeof)===ke?Ee:"$$typeof"in e?Ne[e.$$typeof]:Pe;var t}var ze=Object.defineProperty,De=Object.getOwnPropertyNames,Te=Object.getOwnPropertySymbols,Fe=Object.getOwnPropertyDescriptor,Le=Object.getPrototypeOf,Ge=Object.prototype;function Be(e,t,n){if("string"!=typeof t){if(Ge){var r=Le(t);r&&r!==Ge&&Be(e,r,n)}var o=De(t);Te&&(o=o.concat(Te(t)));for(var a=Oe(e),i=Oe(t),s=0;s<o.length;++s){var c=o[s];if(!(c in Re||n&&n[c]||i&&c in i||a&&c in a)){var l=Fe(t,c);try{ze(e,c,l)}catch{}}}}return e}function We(e){return"function"==typeof e}function Me(e){return"object"==typeof e&&"styledComponentId"in e}function Ye(e,t){return e&&t?"".concat(e," ").concat(t):e||t||""}function Ue(e,t){if(0===e.length)return"";for(var n=e[0],r=1;r<e.length;r++)n+=e[r];return n}function qe(e){return null!==e&&"object"==typeof e&&e.constructor.name===Object.name&&!("props"in e&&e.$$typeof)}function He(e,t,n){if(void 0===n&&(n=!1),!n&&!qe(e)&&!Array.isArray(e))return t;if(Array.isArray(t))for(var r=0;r<t.length;r++)e[r]=He(e[r],t[r]);else if(qe(t))for(var r in t)e[r]=He(e[r],t[r]);return e}function Ze(e,t){Object.defineProperty(e,"toString",{value:t})}function Ve(e){for(var t=[],n=1;n<arguments.length;n++)t[n-1]=arguments[n];return new Error("An error occurred. See https://github.com/styled-components/styled-components/blob/main/packages/styled-components/src/utils/errors.md#".concat(e," for more information.").concat(t.length>0?" Args: ".concat(t.join(", ")):""))}var Je=function(){function e(e){this.groupSizes=new Uint32Array(512),this.length=512,this.tag=e}return e.prototype.indexOfGroup=function(e){for(var t=0,n=0;n<e;n++)t+=this.groupSizes[n];return t},e.prototype.insertRules=function(e,t){if(e>=this.groupSizes.length){for(var n=this.groupSizes,r=n.length,o=r;e>=o;)if((o<<=1)<0)throw Ve(16,"".concat(e));this.groupSizes=new Uint32Array(o),this.groupSizes.set(n),this.length=o;for(var a=r;a<o;a++)this.groupSizes[a]=0}for(var i=this.indexOfGroup(e+1),s=(a=0,t.length);a<s;a++)this.tag.insertRule(i,t[a])&&(this.groupSizes[e]++,i++)},e.prototype.clearGroup=function(e){if(e<this.length){var t=this.groupSizes[e],n=this.indexOfGroup(e),r=n+t;this.groupSizes[e]=0;for(var o=n;o<r;o++)this.tag.deleteRule(n)}},e.prototype.getGroup=function(e){var t="";if(e>=this.length||0===this.groupSizes[e])return t;for(var n=this.groupSizes[e],r=this.indexOfGroup(e),o=r+n,a=r;a<o;a++)t+="".concat(this.tag.getRule(a)).concat(de);return t},e}(),Ke=new Map,Qe=new Map,Xe=1,et=function(e){if(Ke.has(e))return Ke.get(e);for(;Qe.has(Xe);)Xe++;var t=Xe++;return Ke.set(e,t),Qe.set(t,e),t},tt=function(e,t){Xe=t+1,Ke.set(e,t),Qe.set(t,e)},nt="style[".concat(ce,"][").concat(ue,'="').concat(pe,'"]'),rt=new RegExp("^".concat(ce,'\\.g(\\d+)\\[id="([\\w\\d-]+)"\\].*?"([^"]*)')),ot=function(e,t,n){for(var r,o=n.split(","),a=0,i=o.length;a<i;a++)(r=o[a])&&e.registerName(t,r)},at=function(e,t){for(var n,r=(null!==(n=t.textContent)&&void 0!==n?n:"").split(de),o=[],a=0,i=r.length;a<i;a++){var s=r[a].trim();if(s){var c=s.match(rt);if(c){var l=0|parseInt(c[1],10),u=c[2];0!==l&&(tt(u,l),ot(e,u,c[3]),e.getTag().insertRules(l,o)),o.length=0}else o.push(s)}}},it=function(e){for(var t=document.querySelectorAll(nt),n=0,r=t.length;n<r;n++){var o=t[n];o&&o.getAttribute(ce)!==le&&(at(e,o),o.parentNode&&o.parentNode.removeChild(o))}},st=function(e){var t,r,o=document.head,a=e||o,i=document.createElement("style"),s=(t=a,(r=Array.from(t.querySelectorAll("style[".concat(ce,"]"))))[r.length-1]),c=void 0!==s?s.nextSibling:null;i.setAttribute(ce,le),i.setAttribute(ue,pe);var l=n.nc;return l&&i.setAttribute("nonce",l),a.insertBefore(i,c),i},ct=function(){function e(e){this.element=st(e),this.element.appendChild(document.createTextNode("")),this.sheet=function(e){if(e.sheet)return e.sheet;for(var t=document.styleSheets,n=0,r=t.length;n<r;n++){var o=t[n];if(o.ownerNode===e)return o}throw Ve(17)}(this.element),this.length=0}return e.prototype.insertRule=function(e,t){try{return this.sheet.insertRule(t,e),this.length++,!0}catch{return!1}},e.prototype.deleteRule=function(e){this.sheet.deleteRule(e),this.length--},e.prototype.getRule=function(e){var t=this.sheet.cssRules[e];return t&&t.cssText?t.cssText:""},e}(),lt=function(){function e(e){this.element=st(e),this.nodes=this.element.childNodes,this.length=0}return e.prototype.insertRule=function(e,t){if(e<=this.length&&e>=0){var n=document.createTextNode(t);return this.element.insertBefore(n,this.nodes[e]||null),this.length++,!0}return!1},e.prototype.deleteRule=function(e){this.element.removeChild(this.nodes[e]),this.length--},e.prototype.getRule=function(e){return e<this.length?this.nodes[e].textContent:""},e}(),ut=function(){function e(e){this.rules=[],this.length=0}return e.prototype.insertRule=function(e,t){return e<=this.length&&(this.rules.splice(e,0,t),this.length++,!0)},e.prototype.deleteRule=function(e){this.rules.splice(e,1),this.length--},e.prototype.getRule=function(e){return e<this.length?this.rules[e]:""},e}(),pt=fe,dt={isServer:!fe,useCSSOMInjection:!_n},ft=function(){function e(e,t,n){void 0===e&&(e=ge),void 0===t&&(t={});var r=this;this.options=l(l({},dt),e),this.gs=t,this.names=new Map(n),this.server=!!e.isServer,!this.server&&fe&&pt&&(pt=!1,it(this)),Ze(this,function(){return function(e){for(var t=e.getTag(),n=t.length,r="",o=function(n){var o,a=(o=n,Qe.get(o));if(void 0===a)return"continue";var i=e.names.get(a),s=t.getGroup(n);if(void 0===i||!i.size||0===s.length)return"continue";var c="".concat(ce,".g").concat(n,'[id="').concat(a,'"]'),l="";void 0!==i&&i.forEach(function(e){e.length>0&&(l+="".concat(e,","))}),r+="".concat(s).concat(c,'{content:"').concat(l,'"}').concat(de)},a=0;a<n;a++)o(a);return r}(r)})}return e.registerId=function(e){return et(e)},e.prototype.rehydrate=function(){!this.server&&fe&&it(this)},e.prototype.reconstructWithOptions=function(t,n){return void 0===n&&(n=!0),new e(l(l({},this.options),t),this.gs,n&&this.names||void 0)},e.prototype.allocateGSInstance=function(e){return this.gs[e]=(this.gs[e]||0)+1},e.prototype.getTag=function(){return this.tag||(this.tag=(t=(e=this.options).useCSSOMInjection,n=e.target,r=e.isServer?new ut(n):t?new ct(n):new lt(n),new Je(r)));var e,t,n,r},e.prototype.hasNameForId=function(e,t){return this.names.has(e)&&this.names.get(e).has(t)},e.prototype.registerName=function(e,t){if(et(e),this.names.has(e))this.names.get(e).add(t);else{var n=new Set;n.add(t),this.names.set(e,n)}},e.prototype.insertRules=function(e,t,n){this.registerName(e,t),this.getTag().insertRules(et(e),n)},e.prototype.clearNames=function(e){this.names.has(e)&&this.names.get(e).clear()},e.prototype.clearRules=function(e){this.getTag().clearGroup(et(e)),this.clearNames(e)},e.prototype.clearTag=function(){this.tag=void 0},e}(),ht=/&/g,gt=/^\s*\/\/.*$/gm;function mt(e,t){return e.map(function(e){return"rule"===e.type&&(e.value="".concat(t," ").concat(e.value),e.value=e.value.replaceAll(",",",".concat(t," ")),e.props=e.props.map(function(e){return"".concat(t," ").concat(e)})),Array.isArray(e.children)&&"@keyframes"!==e.type&&(e.children=mt(e.children,t)),e})}var vt=new ft,yt=function(){var e,t,n,r=ge,o=r.options,a=void 0===o?ge:o,i=r.plugins,s=void 0===i?he:i,c=function(n,r,o){return o.startsWith(t)&&o.endsWith(t)&&o.replaceAll(t,"").length>0?".".concat(e):n},l=s.slice();l.push(function(e){e.type===g&&e.value.includes("&")&&(e.props[0]=e.props[0].replace(ht,t).replace(n,c))}),a.prefix&&l.push(ie),l.push(ae);var u=function(r,o,i,s){void 0===o&&(o=""),void 0===i&&(i=""),void 0===s&&(s="&"),e=s,t=o,n=new RegExp("\\".concat(t,"\\b"),"g");var c=r.replace(gt,""),u=Q(i||o?"".concat(i," ").concat(o," { ").concat(c," }"):c);a.namespace&&(u=mt(u,a.namespace));var p=[];return oe(u,function(e){var t=k(e);return function(n,r,o,a){for(var i="",s=0;s<t;s++)i+=e[s](n,r,o,a)||"";return i}}(l.concat(function(e){var t;e.root||(e=e.return)&&(t=e,p.push(t))}))),p};return u.hash=s.length?s.reduce(function(e,t){return t.name||Ve(15),Ce(e,t.name)},5381).toString():"",u}(),xt=c.createContext({shouldForwardProp:void 0,styleSheet:vt,stylis:yt});function bt(){return(0,c.useContext)(xt)}xt.Consumer,c.createContext(void 0);var wt=function(){function e(e,t){var n=this;this.inject=function(e,t){void 0===t&&(t=yt);var r=n.name+t.hash;e.hasNameForId(n.id,r)||e.insertRules(n.id,r,t(n.rules,r,"@keyframes"))},this.name=e,this.id="sc-keyframes-".concat(e),this.rules=t,Ze(this,function(){throw Ve(12,String(n.name))})}return e.prototype.getName=function(e){return void 0===e&&(e=yt),this.name+e.hash},e}(),St=function(e){return e>="A"&&e<="Z"};function _t(e){for(var t="",n=0;n<e.length;n++){var r=e[n];if(1===n&&"-"===r&&"-"===e[0])return e;St(r)?t+="-"+r.toLowerCase():t+=r}return t.startsWith("ms-")?"-"+t:t}var Ct=function(e){return null==e||!1===e||""===e},At=function(e){var t,n,r=[];for(var o in e){var a=e[o];e.hasOwnProperty(o)&&!Ct(a)&&(Array.isArray(a)&&a.isCss||We(a)?r.push("".concat(_t(o),":"),a,";"):qe(a)?r.push.apply(r,u(u(["".concat(o," {")],At(a),!1),["}"],!1)):r.push("".concat(_t(o),": ").concat((t=o,null==(n=a)||"boolean"==typeof n||""===n?"":"number"!=typeof n||0===n||t in se||t.startsWith("--")?String(n).trim():"".concat(n,"px")),";")))}return r};function jt(e,t,n,r){return Ct(e)?[]:Me(e)?[".".concat(e.styledComponentId)]:We(e)?!We(o=e)||o.prototype&&o.prototype.isReactComponent||!t?[e]:jt(e(t),t,n,r):e instanceof wt?n?(e.inject(n,r),[e.getName(r)]):[e]:qe(e)?At(e):Array.isArray(e)?Array.prototype.concat.apply(he,e.map(function(e){return jt(e,t,n,r)})):[e.toString()];var o}var It=Ae(pe),kt=function(){function e(e,t,n){this.rules=e,this.staticRulesId="",this.isStatic=(void 0===n||n.isStatic)&&function(e){for(var t=0;t<e.length;t+=1){var n=e[t];if(We(n)&&!Me(n))return!1}return!0}(e),this.componentId=t,this.baseHash=Ce(It,t),this.baseStyle=n,ft.registerId(t)}return e.prototype.generateAndInjectStyles=function(e,t,n){var r=this.baseStyle?this.baseStyle.generateAndInjectStyles(e,t,n):"";if(this.isStatic&&!n.hash)if(this.staticRulesId&&t.hasNameForId(this.componentId,this.staticRulesId))r=Ye(r,this.staticRulesId);else{var o=Ue(jt(this.rules,e,t,n)),a=Se(Ce(this.baseHash,o)>>>0);if(!t.hasNameForId(this.componentId,a)){var i=n(o,".".concat(a),void 0,this.componentId);t.insertRules(this.componentId,a,i)}r=Ye(r,a),this.staticRulesId=a}else{for(var s=Ce(this.baseHash,n.hash),c="",l=0;l<this.rules.length;l++){var u=this.rules[l];if("string"==typeof u)c+=u;else if(u){var p=Ue(jt(u,e,t,n));s=Ce(s,p+l),c+=p}}if(c){var d=Se(s>>>0);t.hasNameForId(this.componentId,d)||t.insertRules(this.componentId,d,n(c,".".concat(d),void 0,this.componentId)),r=Ye(r,d)}}return r},e}(),$t=c.createContext(void 0);$t.Consumer;var Pt={};function Rt(e,t,n){var r,o=Me(e),a=e,i=!je(e),s=t.attrs,u=void 0===s?he:s,p=t.componentId,d=void 0===p?function(e,t){var n="string"!=typeof e?"sc":xe(e);Pt[n]=(Pt[n]||0)+1;var r="".concat(n,"-").concat(function(e){return Se(Ae(e)>>>0)}(pe+n+Pt[n]));return t?"".concat(t,"-").concat(r):r}(t.displayName,t.parentComponentId):p,f=t.displayName,h=void 0===f?je(r=e)?"styled.".concat(r):"Styled(".concat(function(e){return e.displayName||e.name||"Component"}(r),")"):f,g=t.displayName&&t.componentId?"".concat(xe(t.displayName),"-").concat(t.componentId):t.componentId||d,m=o&&a.attrs?a.attrs.concat(u).filter(Boolean):u,v=t.shouldForwardProp;if(o&&a.shouldForwardProp){var y=a.shouldForwardProp;if(t.shouldForwardProp){var x=t.shouldForwardProp;v=function(e,t){return y(e,t)&&x(e,t)}}else v=y}var b=new kt(n,g,o?a.componentStyle:void 0);function w(e,t){return function(e,t,n){var r=e.attrs,o=e.componentStyle,a=e.defaultProps,i=e.foldedComponentIds,s=e.styledComponentId,u=e.target,p=c.useContext($t),d=bt(),f=e.shouldForwardProp||d.shouldForwardProp,h=function(e,t,n){return void 0===n&&(n=ge),e.theme!==n.theme&&e.theme||t||n.theme}(t,p,a)||ge,g=function(e,t,n){for(var r,o=l(l({},t),{className:void 0,theme:n}),a=0;a<e.length;a+=1){var i=We(r=e[a])?r(o):r;for(var s in i)o[s]="className"===s?Ye(o[s],i[s]):"style"===s?l(l({},o[s]),i[s]):i[s]}return t.className&&(o.className=Ye(o.className,t.className)),o}(r,t,h),m=g.as||u,v={};for(var y in g)void 0===g[y]||"$"===y[0]||"as"===y||"theme"===y&&g.theme===h||("forwardedAs"===y?v.as=g.forwardedAs:f&&!f(y,m)||(v[y]=g[y]));var x,b,w,S=(x=o,b=g,w=bt(),x.generateAndInjectStyles(b,w.styleSheet,w.stylis)),_=Ye(i,s);return S&&(_+=" "+S),g.className&&(_+=" "+g.className),v[je(m)&&!me.has(m)?"class":"className"]=_,n&&(v.ref=n),(0,c.createElement)(m,v)}(S,e,t)}w.displayName=h;var S=c.forwardRef(w);return S.attrs=m,S.componentStyle=b,S.displayName=h,S.shouldForwardProp=v,S.foldedComponentIds=o?Ye(a.foldedComponentIds,a.styledComponentId):"",S.styledComponentId=g,S.target=o?a.target:e,Object.defineProperty(S,"defaultProps",{get:function(){return this._foldedDefaultProps},set:function(e){this._foldedDefaultProps=o?function(e){for(var t=[],n=1;n<arguments.length;n++)t[n-1]=arguments[n];for(var r=0,o=t;r<o.length;r++)He(e,o[r],!0);return e}({},a.defaultProps,e):e}}),Ze(S,function(){return".".concat(S.styledComponentId)}),i&&Be(S,e,{attrs:!0,componentStyle:!0,displayName:!0,foldedComponentIds:!0,shouldForwardProp:!0,styledComponentId:!0,target:!0}),S}function Et(e,t){for(var n=[e[0]],r=0,o=t.length;r<o;r+=1)n.push(t[r],e[r+1]);return n}var Nt=function(e){return Object.assign(e,{isCss:!0})};function Ot(e){for(var t=[],n=1;n<arguments.length;n++)t[n-1]=arguments[n];if(We(e)||qe(e))return Nt(jt(Et(he,u([e],t,!0))));var r=e;return 0===t.length&&1===r.length&&"string"==typeof r[0]?jt(r):Nt(jt(Et(r,t)))}function zt(e,t,n){if(void 0===n&&(n=ge),!t)throw Ve(1,t);var r=function(r){for(var o=[],a=1;a<arguments.length;a++)o[a-1]=arguments[a];return e(t,n,Ot.apply(void 0,u([r],o,!1)))};return r.attrs=function(r){return zt(e,t,l(l({},n),{attrs:Array.prototype.concat(n.attrs,r).filter(Boolean)}))},r.withConfig=function(r){return zt(e,t,l(l({},n),r))},r}var Dt=function(e){return zt(Rt,e)},Tt=Dt;me.forEach(function(e){Tt[e]=Dt(e)}),"__sc-".concat(ce,"__");const Ft=Tt.div`
	display: flex;
	flex-direction: column;
	padding: 24px;
	font-family: var( --wp-admin-font-family );
	min-height: calc( 100vh - 32px );
`,Lt=Tt.div`
	display: flex;
	flex-direction: column;
	gap: 8px;
	margin-bottom: 15px;
`,Gt=Tt.h2`
	font-size: 20px;
	font-weight: 600;
	margin: 0;
	color: #1e1e1e;
`,Bt=Tt.p`
	font-size: 13px;
	margin: 0;
	color: #6b7280;
	line-height: 1.5;
`,Wt=Tt.div`
	display: grid;
	grid-template-columns: repeat( auto-fill, minmax( 500px, 1fr ) );
	gap: 24px;
	width: 100%;

	@media ( max-width: 768px ) {
		grid-template-columns: 1fr;
		gap: 16px;
	}
`,Mt=Tt.div`
	display: flex;
	align-items: flex-start;
	gap: 20px;
	padding: 20px;
	background: #fff;
	border: 1px solid #eee;
	border-radius: 4px;
	position: relative;
`,Yt=Tt.div`
	flex-shrink: 0;
	width: 80px;
	height: 80px;
	display: flex;
	align-items: center;
	justify-content: center;
	overflow: hidden;
	padding: 12px;

	img {
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
`,Ut=Tt.div`
	flex: 1;
	display: flex;
	flex-direction: column;
	gap: 8px;
	min-width: 0;
`,qt=Tt.h3`
	font-size: 18px;
	font-weight: 600;
	margin: 0;
	color: #2271b1;
	line-height: 1.4;
	cursor: pointer;

	&:hover {
		color: #135e96;
	}
`,Ht=Tt.p`
	font-size: 0.85rem;
	color: #1e1e1e;
	margin: 0;
	line-height: 1.6;
`,Zt=Tt.div`
	font-size: 14px;
	color: #1e1e1e;
	margin-top: 4px;

	a {
		color: #2271b1;
		text-decoration: none;

		&:hover {
			color: #135e96;
			text-decoration: underline;
		}
	}
`,Vt=Tt.div`
	display: flex;
	flex-direction: column;
	align-items: flex-end;
	gap: 8px;
	flex-shrink: 0;
	margin-left: 20px;
`,Jt=Tt.button`
	font-size: 13px;
	color: #2271b1;
	cursor: pointer;
	line-height: 1.4;
	border: none;
	background: none;
	padding: 0;
	margin: 0;
	font-size: 13px;
	color: #2271b1;
	cursor: pointer;
`,Kt=Tt(s.Modal)`
	.components-modal__header {
		display: none !important;
	}

	.components-modal__content {
		overflow: hidden !important;
		padding: 0 !important;
		margin: 0 !important;
	}

	.components-modal__header + div {
		overflow: hidden !important;
		height: 100% !important;
	}

	.components-modal__frame {
		overflow: hidden !important;
	}
`,Qt=Tt.div`
	width: 100%;
	height: calc( 100vh - 100px );
	position: relative;
`,Xt=Tt.iframe`
	width: 100%;
	height: 100%;
	border: none;
	opacity: ${e=>e.$isLoading?0:1};
	transition: opacity 0.3s ease;
`,en=Tt.div`
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate( -50%, -50% );
	z-index: 1;
	display: ${e=>e.$isLoading?"flex":"none"};
	align-items: center;
	justify-content: center;
`,tn=Tt(s.Button)`
	position: fixed !important;
	top: 50px !important;
	right: calc( 50vw - 400px - 52px ) !important;
	z-index: 10000000 !important;
	background: #fff !important;
	border: 1px solid #ccc !important;
	border-radius: 4px !important;
	padding: 6px !important;
	min-width: auto !important;
	box-shadow: 0 2px 4px rgba( 0, 0, 0, 0.1 ) !important;
	display: flex !important;
	visibility: visible !important;
	opacity: 1 !important;

	@media ( max-width: 782px ) {
		right: calc( 5vw - 40px ) !important;
		top: 60px !important;
	}

	@media ( max-width: 480px ) {
		right: 0px !important;
		top: 40px !important;
	}

	&:hover {
		background: #f0f0f1 !important;
		border-color: #999 !important;
	}
`;function nn({initialPlugins:e,installNonce:t,style:n}){const[c,l]=(0,i.useState)(null),[u,p]=(0,i.useState)(!0),[d,f]=(0,i.useState)(e),[h,g]=(0,i.useState)(new Set),m=e=>e.activated?(0,o.__)("Activated"):e.installed?(0,o.__)("Activate Now"):(0,o.__)("Install Now"),v=e=>{l(e),p(!0)},y=()=>{l(null),p(!0)};return(0,r.jsxs)(Ft,{style:n,children:[(0,r.jsxs)(Lt,{children:[(0,r.jsx)(Gt,{children:(0,o.__)("Our Plugins")}),(0,r.jsx)(Bt,{children:(0,o.__)("Discover and install our premium WordPress plugins to enhance your website functionality.")})]}),(0,r.jsx)(Wt,{children:d.map(e=>{const n=e.activated;return(0,r.jsxs)(Mt,{children:[(0,r.jsx)(Yt,{children:(0,r.jsx)("img",{src:e.logoURL,alt:e.name,loading:"lazy"})}),(0,r.jsxs)(Ut,{children:[(0,r.jsx)(qt,{onClick:()=>v(e.slug),children:e.name}),(0,r.jsx)(Ht,{children:e.description}),(0,r.jsxs)(Zt,{children:[(0,o.__)("See")," ",(0,r.jsx)("a",{href:e.docsURL,target:"_blank",rel:"noopener noreferrer",children:(0,o.__)("Documentation")})]})]}),(0,r.jsxs)(Vt,{children:[(0,r.jsx)("button",{className:"button"+(e.installed&&!e.activated?" button-primary":""),onClick:()=>(async(e,n)=>{if(g(t=>new Set(t).add(e.slug)),"activate"!==n)try{const n=new FormData;n.append("action","install-plugin"),n.append("slug",e.slug),n.append("_ajax_nonce",t);const r=await(await fetch("/wp-admin/admin-ajax.php",{method:"POST",body:n})).json();if(!r.success)throw new Error(r.data?.message||(0,o.__)("Failed to install plugin"));f(t=>t.map(t=>t.slug===e.slug?{...t,installed:!0,activateUrl:r.data?.activateUrl}:t))}catch(e){console.error("Error installing plugin:",e),alert(e.message||(0,o.__)("An error occurred while installing the plugin. Please try again."))}finally{g(t=>{const n=new Set(t);return n.delete(e.slug),n})}else window.location.href=e.activateUrl.replaceAll("&amp;","&").replace("%2F","/")})(e,e.installed&&!e.activated?"activate":"install"),disabled:n||h.has(e.slug),children:h.has(e.slug)?(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)(s.Spinner,{})," ",e.installed?(0,o.__)("Activating..."):(0,o.__)("Installing...")]}):m(e)}),(0,r.jsx)(Jt,{onClick:()=>v(e.slug),children:(0,o.__)("More Details")})]})]},e.slug)})}),c&&(0,i.createPortal)((0,r.jsx)(tn,{icon:a.A,onClick:y,label:(0,o.__)("Close")}),document.body),c&&(0,r.jsx)(Kt,{onRequestClose:y,isFullScreen:!1,style:{maxWidth:"800px",width:"90%",maxHeight:"inherit !important"},children:(0,r.jsxs)(Qt,{children:[(0,r.jsx)(en,{$isLoading:u,children:(0,r.jsx)(s.Spinner,{})}),(0,r.jsx)(Xt,{src:(x=c,`${window.location.origin}/wp-admin/plugin-install.php?tab=plugin-information&plugin=${x}`),title:(0,o.__)("Plugin Information"),onLoad:()=>{p(!1)},$isLoading:u})]})})]});var x}},4902:(e,t,n)=>{n.d(t,{A:()=>a});var r=n(5573),o=n(790),a=(0,o.jsx)(r.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:(0,o.jsx)(r.Path,{d:"m13.06 12 6.47-6.47-1.06-1.06L12 10.94 5.53 4.47 4.47 5.53 10.94 12l-6.47 6.47 1.06 1.06L12 13.06l6.47 6.47 1.06-1.06L13.06 12Z"})})}}]);