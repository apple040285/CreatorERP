(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-333ad5d6"],{"205f":function(e,t,r){"use strict";r.d(t,"a",(function(){return B}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("9b76"),i=r("8690"),l=r("365c"),u=r("d82f"),s=r("cf75"),f=r("d580"),d=r("6197"),O=r("b885");function p(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,c)}return r}function j(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?p(Object(r),!0).forEach((function(t){g(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function g(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var h=Object(s["d"])(Object(u["m"])(j(j({},Object(s["a"])(f["a"],s["f"].bind(null,"footer"))),{},{footer:Object(s["c"])(o["r"]),footerClass:Object(s["c"])(o["e"]),footerHtml:Object(s["c"])(o["r"])})),a["l"]),m=c["default"].extend({name:a["l"],functional:!0,props:h,render:function(e,t){var r,c=t.props,a=t.data,o=t.children,b=c.footerBgVariant,l=c.footerBorderVariant,u=c.footerTextVariant;return e(c.footerTag,Object(n["a"])(a,{staticClass:"card-footer",class:[c.footerClass,(r={},g(r,"bg-".concat(b),b),g(r,"border-".concat(l),l),g(r,"text-".concat(u),u),r)],domProps:o?{}:Object(i["a"])(c.footerHtml,c.footer)}),o)}}),v=r("4918");function y(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,c)}return r}function w(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?y(Object(r),!0).forEach((function(t){P(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):y(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function P(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var x=Object(s["d"])(Object(u["m"])(w(w({},Object(u["k"])(v["b"],["src","alt","width","height","left","right"])),{},{bottom:Object(s["c"])(o["g"],!1),end:Object(s["c"])(o["g"],!1),start:Object(s["c"])(o["g"],!1),top:Object(s["c"])(o["g"],!1)})),a["n"]),T=c["default"].extend({name:a["n"],functional:!0,props:x,render:function(e,t){var r=t.props,c=t.data,a=r.src,o=r.alt,b=r.width,i=r.height,l="card-img";return r.top?l+="-top":r.right||r.end?l+="-right":r.bottom?l+="-bottom":(r.left||r.start)&&(l+="-left"),e("img",Object(n["a"])(c,{class:l,attrs:{src:a,alt:o,width:b,height:i}}))}});function k(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,c)}return r}function D(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?k(Object(r),!0).forEach((function(t){C(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):k(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function C(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var V=Object(s["a"])(x,s["f"].bind(null,"img"));V.imgSrc.required=!1;var S=Object(s["d"])(Object(u["m"])(D(D(D(D(D(D({},d["b"]),O["b"]),h),V),f["a"]),{},{align:Object(s["c"])(o["r"]),noBody:Object(s["c"])(o["g"],!1)})),a["j"]),B=c["default"].extend({name:a["j"],functional:!0,props:S,render:function(e,t){var r,c=t.props,a=t.data,o=t.slots,u=t.scopedSlots,f=c.imgSrc,p=c.imgLeft,j=c.imgRight,g=c.imgStart,v=c.imgEnd,y=c.imgBottom,w=c.header,P=c.headerHtml,x=c.footer,k=c.footerHtml,D=c.align,S=c.textVariant,B=c.bgVariant,E=c.borderVariant,_=u||{},J=o(),W={},H=e(),q=e();if(f){var z=e(T,{props:Object(s["e"])(V,c,s["h"].bind(null,"img"))});y?q=z:H=z}var R=e(),A=Object(l["a"])(b["p"],_,J);(A||w||P)&&(R=e(O["a"],{props:Object(s["e"])(O["b"],c),domProps:A?{}:Object(i["a"])(P,w)},Object(l["b"])(b["p"],W,_,J)));var G=Object(l["b"])(b["f"],W,_,J);c.noBody||(G=e(d["a"],{props:Object(s["e"])(d["b"],c)},G),c.overlay&&f&&(G=e("div",{staticClass:"position-relative"},[H,G,q]),H=e(),q=e()));var L=e(),U=Object(l["a"])(b["o"],_,J);return(U||x||k)&&(L=e(m,{props:Object(s["e"])(h,c),domProps:A?{}:Object(i["a"])(k,x)},Object(l["b"])(b["o"],W,_,J))),e(c.tag,Object(n["a"])(a,{staticClass:"card",class:(r={"flex-row":p||g,"flex-row-reverse":(j||v)&&!(p||g)},C(r,"text-".concat(D),D),C(r,"bg-".concat(B),B),C(r,"border-".concat(E),E),C(r,"text-".concat(S),S),r)}),[H,R,G,L,q])}})},4918:function(e,t,r){"use strict";r.d(t,"b",(function(){return j})),r.d(t,"a",(function(){return g}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("2326"),i=r("6c06"),l=r("7b1e"),u=r("3a58"),s=r("cf75"),f=r("fa73");function d(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var O='<svg width="%{w}" height="%{h}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 %{w} %{h}" preserveAspectRatio="none"><rect width="100%" height="100%" style="fill:%{f};"></rect></svg>',p=function(e,t,r){var c=encodeURIComponent(O.replace("%{w}",Object(f["f"])(e)).replace("%{h}",Object(f["f"])(t)).replace("%{f}",r));return"data:image/svg+xml;charset=UTF-8,".concat(c)},j=Object(s["d"])({alt:Object(s["c"])(o["r"]),blank:Object(s["c"])(o["g"],!1),blankColor:Object(s["c"])(o["r"],"transparent"),block:Object(s["c"])(o["g"],!1),center:Object(s["c"])(o["g"],!1),fluid:Object(s["c"])(o["g"],!1),fluidGrow:Object(s["c"])(o["g"],!1),height:Object(s["c"])(o["o"]),left:Object(s["c"])(o["g"],!1),right:Object(s["c"])(o["g"],!1),rounded:Object(s["c"])(o["j"],!1),sizes:Object(s["c"])(o["f"]),src:Object(s["c"])(o["r"]),srcset:Object(s["c"])(o["f"]),thumbnail:Object(s["c"])(o["g"],!1),width:Object(s["c"])(o["o"])},a["O"]),g=c["default"].extend({name:a["O"],functional:!0,props:j,render:function(e,t){var r,c=t.props,a=t.data,o=c.alt,s=c.src,O=c.block,j=c.fluidGrow,g=c.rounded,h=Object(u["b"])(c.width)||null,m=Object(u["b"])(c.height)||null,v=null,y=Object(b["b"])(c.srcset).filter(i["a"]).join(","),w=Object(b["b"])(c.sizes).filter(i["a"]).join(",");return c.blank&&(!m&&h?m=h:!h&&m&&(h=m),h||m||(h=1,m=1),s=p(h,m,c.blankColor||"transparent"),y=null,w=null),c.left?v="float-left":c.right?v="float-right":c.center&&(v="mx-auto",O=!0),e("img",Object(n["a"])(a,{attrs:{src:s,alt:o,width:h?Object(f["f"])(h):null,height:m?Object(f["f"])(m):null,srcset:y||null,sizes:w||null},class:(r={"img-thumbnail":c.thumbnail,"img-fluid":c.fluid||j,"w-100":j,rounded:""===g||!0===g},d(r,"rounded-".concat(g),Object(l["l"])(g)&&""!==g),d(r,v,v),d(r,"d-block",O),r)}))}})},4968:function(e,t,r){"use strict";r.d(t,"b",(function(){return l})),r.d(t,"a",(function(){return u}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("cf75"),i=r("fa73"),l=Object(b["d"])({title:Object(b["c"])(o["r"]),titleTag:Object(b["c"])(o["r"],"h4")},a["q"]),u=c["default"].extend({name:a["q"],functional:!0,props:l,render:function(e,t){var r=t.props,c=t.data,a=t.children;return e(r.titleTag,Object(n["a"])(c,{staticClass:"card-title"}),a||Object(i["f"])(r.title))}})},6197:function(e,t,r){"use strict";r.d(t,"b",(function(){return p})),r.d(t,"a",(function(){return j}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("d82f"),i=r("cf75"),l=r("d580"),u=r("4968"),s=r("ba06");function f(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,c)}return r}function d(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?f(Object(r),!0).forEach((function(t){O(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function O(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var p=Object(i["d"])(Object(b["m"])(d(d(d(d({},u["b"]),s["b"]),Object(i["a"])(l["a"],i["f"].bind(null,"body"))),{},{bodyClass:Object(i["c"])(o["e"]),overlay:Object(i["c"])(o["g"],!1)})),a["k"]),j=c["default"].extend({name:a["k"],functional:!0,props:p,render:function(e,t){var r,c=t.props,a=t.data,o=t.children,b=c.bodyBgVariant,l=c.bodyBorderVariant,f=c.bodyTextVariant,d=e();c.title&&(d=e(u["a"],{props:Object(i["e"])(u["b"],c)}));var p=e();return c.subTitle&&(p=e(s["a"],{props:Object(i["e"])(s["b"],c),class:["mb-2"]})),e(c.bodyTag,Object(n["a"])(a,{staticClass:"card-body",class:[(r={"card-img-overlay":c.overlay},O(r,"bg-".concat(b),b),O(r,"border-".concat(l),l),O(r,"text-".concat(f),f),r),c.bodyClass]}),[d,p,o])}})},7277:function(e,t,r){"use strict";r.r(t);var c=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("b-card",{attrs:{title:"Kick start your project 🚀"}},[r("b-card-text",[e._v("All the best for your new project.")]),r("b-card-text",[e._v("Please make sure to read our "),r("b-link",{attrs:{href:"https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/",target:"_blank"}},[e._v(" Template Documentation ")]),e._v(" to understand where to go from here and how to use our template.")],1)],1),r("b-card",{attrs:{title:"Want to integrate JWT? 🔒"}},[r("b-card-text",[e._v("We carefully crafted JWT flow so you can implement JWT with ease and with minimum efforts.")]),r("b-card-text",[e._v("Please read our JWT Documentation to get more out of JWT authentication.")])],1)],1)},n=[],a=r("205f"),o=r("d6e4"),b=r("aa59"),i={components:{BCard:a["a"],BCardText:o["a"],BLink:b["a"]}},l=i,u=r("2877"),s=Object(u["a"])(l,c,n,!1,null,null,null);t["default"]=s.exports},b885:function(e,t,r){"use strict";r.d(t,"b",(function(){return O})),r.d(t,"a",(function(){return p}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("8690"),i=r("d82f"),l=r("cf75"),u=r("d580");function s(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);t&&(c=c.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,c)}return r}function f(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?s(Object(r),!0).forEach((function(t){d(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):s(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function d(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var O=Object(l["d"])(Object(i["m"])(f(f({},Object(l["a"])(u["a"],l["f"].bind(null,"header"))),{},{header:Object(l["c"])(o["r"]),headerClass:Object(l["c"])(o["e"]),headerHtml:Object(l["c"])(o["r"])})),a["m"]),p=c["default"].extend({name:a["m"],functional:!0,props:O,render:function(e,t){var r,c=t.props,a=t.data,o=t.children,i=c.headerBgVariant,l=c.headerBorderVariant,u=c.headerTextVariant;return e(c.headerTag,Object(n["a"])(a,{staticClass:"card-header",class:[c.headerClass,(r={},d(r,"bg-".concat(i),i),d(r,"border-".concat(l),l),d(r,"text-".concat(u),u),r)],domProps:o?{}:Object(b["a"])(c.headerHtml,c.header)}),o)}})},ba06:function(e,t,r){"use strict";r.d(t,"b",(function(){return l})),r.d(t,"a",(function(){return u}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("cf75"),i=r("fa73"),l=Object(b["d"])({subTitle:Object(b["c"])(o["r"]),subTitleTag:Object(b["c"])(o["r"],"h6"),subTitleTextVariant:Object(b["c"])(o["r"],"muted")},a["o"]),u=c["default"].extend({name:a["o"],functional:!0,props:l,render:function(e,t){var r=t.props,c=t.data,a=t.children;return e(r.subTitleTag,Object(n["a"])(c,{staticClass:"card-subtitle",class:[r.subTitleTextVariant?"text-".concat(r.subTitleTextVariant):null]}),a||Object(i["f"])(r.subTitle))}})},d580:function(e,t,r){"use strict";r.d(t,"a",(function(){return b}));var c=r("2b0e"),n=r("c637"),a=r("a723"),o=r("cf75"),b=Object(o["d"])({bgVariant:Object(o["c"])(a["r"]),borderVariant:Object(o["c"])(a["r"]),tag:Object(o["c"])(a["r"],"div"),textVariant:Object(o["c"])(a["r"])},n["j"]);c["default"].extend({props:b})},d6e4:function(e,t,r){"use strict";r.d(t,"a",(function(){return l}));var c=r("2b0e"),n=r("b42e"),a=r("c637"),o=r("a723"),b=r("cf75"),i=Object(b["d"])({textTag:Object(b["c"])(o["r"],"p")},a["p"]),l=c["default"].extend({name:a["p"],functional:!0,props:i,render:function(e,t){var r=t.props,c=t.data,a=t.children;return e(r.textTag,Object(n["a"])(c,{staticClass:"card-text"}),a)}})}}]);
//# sourceMappingURL=chunk-333ad5d6.0d7fbbd4.js.map