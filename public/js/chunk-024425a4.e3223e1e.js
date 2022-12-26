(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-024425a4","chunk-6977adfe"],{1728:function(t,e,n){"use strict";n.r(e);n("a15b9"),n("d81d"),n("b0c0");var a=function(){var t=this,e=t._self._c;return e("div",[e("PaginationTable",{ref:"table",attrs:{title:t.$t("Backend Account Management"),"show-loading":t.showLoading,"fetch-all":t.fetchAll,tableColumns:t.tableColumns,itemsCount:t.itemsCount},on:{"add-sidebar":function(){return t.$router.push({name:"SystemManagement-BackendAccountManagementCreate"})}},scopedSlots:t._u([{key:"cell(id)",fn:function(e){return[t._v(" "+t._s(e.row.originalIndex+1)+" ")]}},{key:"cell(roles)",fn:function(n){return[e("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(n.row.roles.map((function(t){return t.name})).join(","))+" ")])]}},{key:"cell(action)",fn:function(n){return[e("span",{staticClass:"text-nowrap"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mr-50",attrs:{variant:"outline-success",size:"sm",to:{name:"SystemManagement-BackendAccountManagementEdit",query:{id:n.row.id}}}},[e("feather-icon",{staticClass:"mr-25",attrs:{icon:"Edit2Icon"}}),e("span",[t._v(t._s(t.$t("edit")))])],1),e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-danger",size:"sm"},on:{click:function(e){return t.deleteMethod(n.row.id)}}},[e("feather-icon",{staticClass:"mr-25",attrs:{icon:"Trash2Icon"}}),e("span",[t._v(t._s(t.$t("delete")))])],1)],1)]}}])})],1)},r=[],c=(n("99af"),n("541c")),o=n("a15b"),i=n("b28b"),s=n("26d2"),l=n("8226"),u=n("4797"),d=n("8361"),b=n("1947"),f=n("01e3"),p=n("f617"),m=n("7f80"),h=n("e009"),v=n("223c"),g=n("3a32"),O=n("ed09"),j={components:{BCardCode:c["a"],BRow:o["a"],BCol:i["a"],VueGoodTable:p["a"],BPagination:s["a"],BFormGroup:l["a"],BFormInput:u["a"],BFormSelect:d["a"],BButton:b["a"],ToastificationContent:v["a"],BSpinner:f["a"],PaginationTable:g["a"]},directives:{Ripple:h["a"]},setup:function(){var t=Object(O["ref"])(!1),e=[{label:"#",field:"id"},{label:"BackendAccountManagementList.role",field:"roles"},{label:"BackendAccountManagementList.name",field:"name"},{label:"BackendAccountManagementList.account",field:"email"},{label:"BackendAccountManagementList.created_by",field:"creator.name"},{label:"BackendAccountManagementList.created_at",field:"created_at"},{label:"BackendAccountManagementList.updated_by",field:"editor.name"},{label:"BackendAccountManagementList.updated_at",field:"updated_at"},{label:"BackendAccountManagementList.action",field:"action"}],n="/users",a=Object(O["ref"])(0),r=function(e,r){t.value=!0,m["a"].post("".concat(n,"/list"),e).then((function(e){var n=e.data,c=n.data,o=n.meta;r(c),a.value=o.total,t.value=!1})).catch((function(t){console.log(t)}))};return{apiPath:n,showLoading:t,tableColumns:e,itemsCount:a,fetchAll:r}},methods:{deleteMethod:function(t){var e=this;this.$swal({title:"".concat(this.$t("checkDelete")),text:"".concat(this.$t("cantRevert")),icon:"warning",showCancelButton:!0,confirmButtonText:"".concat(this.$t("yes")),cancelButtonText:"".concat(this.$t("no")),customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1}).then((function(n){n.value&&m["a"].delete("".concat(e.apiPath,"/").concat(t)).then((function(){e.fetchAll(e.$refs.table.serverParams,(function(t){return e.$refs.table.rows=t})),e.$toast({component:v["a"],position:"top-right",props:{title:"".concat(e.$t("deletedSuccess")),icon:"CoffeeIcon",variant:"success",text:"".concat(e.$t("Backend Account Management")," ").concat(e.$t("deletedSuccess"),"!")}})})).catch((function(t){e.$toast({component:v["a"],position:"top-right",props:{title:"".concat(e.$t("deletedFailed")),icon:"XIcon",variant:"danger",text:t.response.data.message}})}))}))}}},y=j,w=n("2877"),C=Object(w["a"])(y,a,r,!1,null,null,null);e["default"]=C.exports},"19a2":function(t,e,n){},"223c":function(t,e,n){"use strict";var a=function(){var t=this,e=t._self._c;return e("div",{staticClass:"toastification"},[e("div",{staticClass:"d-flex align-items-start"},[e("b-avatar",{staticClass:"mr-75 flex-shrink-0",attrs:{variant:t.variant,size:"1.8rem"}},[e("feather-icon",{attrs:{icon:t.icon,size:"15"}})],1),e("div",{staticClass:"d-flex flex-grow-1"},[e("div",[t.title?e("h5",{staticClass:"mb-0 font-weight-bolder toastification-title",class:"text-".concat(t.variant),domProps:{textContent:t._s(t.title)}}):t._e(),t.text?e("small",{staticClass:"d-inline-block text-body",domProps:{textContent:t._s(t.text)}}):t._e()]),e("span",{staticClass:"cursor-pointer toastification-close-icon ml-auto",on:{click:function(e){return t.$emit("close-toast")}}},[t.hideClose?t._e():e("feather-icon",{staticClass:"text-body",attrs:{icon:"XIcon"}})],1)])],1)])},r=[],c=n("e8a3"),o={components:{BAvatar:c["a"]},props:{variant:{type:String,default:"primary"},icon:{type:String,default:null},title:{type:String,default:null},text:{type:String,default:null},hideClose:{type:Boolean,default:!1}}},i=o,s=(n("fc45"),n("2877")),l=Object(s["a"])(i,a,r,!1,null,"55dd3057",null);e["a"]=l.exports},"35d1":function(t,e,n){"use strict";n("4ae1")},"3a32":function(t,e,n){"use strict";n("c740");var a=function(){var t=this,e=t._self._c;return e("b-card",{staticClass:"mb-2",attrs:{"no-body":""}},[e("div",{staticClass:"card-header"},[e("div",[e("b-card-title",[t._v(t._s(t.$attrs.title))]),t.$attrs["sub-title"]?e("b-card-sub-title",[t._v(" "+t._s(t.$attrs["sub-title"])+" ")]):t._e()],1)]),e("div",{staticClass:"mx-1"},[t._t("header",(function(){return[e("b-row",[e("b-col",{staticClass:"d-flex align-items-center justify-content-start mb-1 mb-md-0",attrs:{cols:"12",md:"6"}}),e("b-col",{attrs:{cols:"12",md:"6"}},[e("div",{staticClass:"custom-search d-flex justify-content-end"},[e("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"outline-primary"},on:{click:function(e){return t.$emit("add-sidebar")}}},[t._v(" "+t._s(t.$t("create"))+" ")]),e("b-form-group",[e("div",{staticClass:"d-flex align-items-center"},[e("b-form-input",{staticClass:"d-inline-block",attrs:{debounce:"400",type:"text",placeholder:t.$t("table.Search")},model:{value:t.serverParams.searchTerm,callback:function(e){t.$set(t.serverParams,"searchTerm",e)},expression:"serverParams.searchTerm"}})],1)])],1)])],1)]}))],2),e("vue-good-table",{staticClass:"m-1",attrs:{mode:"remote",isLoading:t.showLoading,rows:t.rows,columns:t.tableColumns,totalRows:t.itemsCount,"pagination-options":{enabled:!0},"search-options":{enabled:!0,trigger:"enter",externalQuery:t.serverParams.searchTerm},"sort-options":{enabled:!0}},on:{"update:isLoading":function(e){t.showLoading=e},"update:is-loading":function(e){t.showLoading=e},"on-page-change":t.onPageChange,"on-per-page-change":t.onPerPageChange,"on-search":t.onSearch,"on-sort-change":t.onSortChange},scopedSlots:t._u([{key:"loadingContent",fn:function(){return[e("div",{staticClass:"text-center"},[e("b-spinner",{attrs:{variant:"primary",label:"Text Centered"}})],1)]},proxy:!0},{key:"table-column",fn:function(n){return["#"!==n.column.label?e("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t(n.column.label))+" ")]):t._e()]}},{key:"table-row",fn:function(e){return[t._l(t.$scopedSlots,(function(n,a){return["cell(".concat(e.column.field,")")===a?t._t(a,null,null,{row:e.row,value:e.formattedRow[e.column.field]}):t._e()]})),"undefined"===typeof t.$scopedSlots["cell(".concat(e.column.field,")")]&&-1!==t.tableColumns.findIndex((function(t){return t.field===e.column.field}))?[t._v(" "+t._s(e.formattedRow[e.column.field])+" ")]:t._e()]}},{key:"pagination-bottom",fn:function(n){return[e("div",{staticClass:"d-flex justify-content-between flex-wrap"},[e("div",{staticClass:"d-flex align-items-center mb-0 mt-1"},[e("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("table.Showing"))+" 1 "+t._s(t.$t("table.to"))+" ")]),e("b-form-select",{staticClass:"mx-1",attrs:{options:t.perPageOptions},on:{input:function(t){return n.perPageChanged({currentPerPage:t})}},model:{value:t.serverParams.perPage,callback:function(e){t.$set(t.serverParams,"perPage",e)},expression:"serverParams.perPage"}}),e("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("table.of"))+" "+t._s(n.total)+" "+t._s(t.$t("table.entries"))+" ")])],1),e("div",[e("b-pagination",{staticClass:"mt-1 mb-0",attrs:{"total-rows":n.total,"per-page":t.serverParams.perPage,"first-number":"","last-number":"",align:"right","prev-class":"prev-item","next-class":"next-item"},on:{input:function(t){return n.pageChanged({currentPerPage:t})}},scopedSlots:t._u([{key:"prev-text",fn:function(){return[e("feather-icon",{attrs:{icon:"ChevronLeftIcon",size:"18"}})]},proxy:!0},{key:"next-text",fn:function(){return[e("feather-icon",{attrs:{icon:"ChevronRightIcon",size:"18"}})]},proxy:!0}],null,!0),model:{value:t.serverParams.page,callback:function(e){t.$set(t.serverParams,"page",e)},expression:"serverParams.page"}})],1)])]}}],null,!0)})],1)},r=[],c=(n("a9e3"),n("2b0e")),o=n("c637"),i=n("0056"),s=n("a723"),l=n("9b76"),u=n("3a58"),d=n("8c18"),b=n("cf75"),f=n("01e3"),p=n("ce2a");function m(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,a)}return n}function h(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?m(Object(n),!0).forEach((function(e){v(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):m(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function v(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var g={top:0,left:0,bottom:0,right:0},O=Object(b["d"])({bgColor:Object(b["c"])(s["r"]),blur:Object(b["c"])(s["r"],"2px"),fixed:Object(b["c"])(s["g"],!1),noCenter:Object(b["c"])(s["g"],!1),noFade:Object(b["c"])(s["g"],!1),noWrap:Object(b["c"])(s["g"],!1),opacity:Object(b["c"])(s["o"],.85,(function(t){var e=Object(u["a"])(t,0);return e>=0&&e<=1})),overlayTag:Object(b["c"])(s["r"],"div"),rounded:Object(b["c"])(s["j"],!1),show:Object(b["c"])(s["g"],!1),spinnerSmall:Object(b["c"])(s["g"],!1),spinnerType:Object(b["c"])(s["r"],"border"),spinnerVariant:Object(b["c"])(s["r"]),variant:Object(b["c"])(s["r"],"light"),wrapTag:Object(b["c"])(s["r"],"div"),zIndex:Object(b["c"])(s["o"],10)},o["hb"]),j=c["default"].extend({name:o["hb"],mixins:[d["a"]],props:O,computed:{computedRounded:function(){var t=this.rounded;return!0===t||""===t?"rounded":t?"rounded-".concat(t):""},computedVariant:function(){var t=this.variant;return t&&!this.bgColor?"bg-".concat(t):""},slotScope:function(){return{spinnerType:this.spinnerType||null,spinnerVariant:this.spinnerVariant||null,spinnerSmall:this.spinnerSmall}}},methods:{defaultOverlayFn:function(t){var e=t.spinnerType,n=t.spinnerVariant,a=t.spinnerSmall;return this.$createElement(f["a"],{props:{type:e,variant:n,small:a}})}},render:function(t){var e=this,n=this.show,a=this.fixed,r=this.noFade,c=this.noWrap,o=this.slotScope,s=t();if(n){var u=t("div",{staticClass:"position-absolute",class:[this.computedVariant,this.computedRounded],style:h(h({},g),{},{opacity:this.opacity,backgroundColor:this.bgColor||null,backdropFilter:this.blur?"blur(".concat(this.blur,")"):null})}),d=t("div",{staticClass:"position-absolute",style:this.noCenter?h({},g):{top:"50%",left:"50%",transform:"translateX(-50%) translateY(-50%)"}},[this.normalizeSlot(l["C"],o)||this.defaultOverlayFn(o)]);s=t(this.overlayTag,{staticClass:"b-overlay",class:{"position-absolute":!c||c&&!a,"position-fixed":c&&a},style:h(h({},g),{},{zIndex:this.zIndex||10}),on:{click:function(t){return e.$emit(i["f"],t)}},key:"overlay"},[u,d])}return s=t(p["a"],{props:{noFade:r,appear:!0},on:{"after-enter":function(){return e.$emit(i["E"])},"after-leave":function(){return e.$emit(i["r"])}}},[s]),c?s:t(this.wrapTag,{staticClass:"b-overlay-wrap position-relative",attrs:{"aria-busy":n?"true":null}},c?[s]:[this.normalizeSlot(),s])}}),y=n("205f"),w=n("4968"),C=n("ba06"),x=n("a15b"),P=n("b28b"),S=n("26d2"),k=n("1947"),_=n("8226"),B=n("4797"),$=n("8361"),A=n("ed09"),z=n("f617"),T=n("e009"),L={components:{BOverlay:j,BSpinner:f["a"],BCard:y["a"],BCardTitle:w["a"],BCardSubTitle:C["a"],BRow:x["a"],BCol:P["a"],BPagination:S["a"],BButton:k["a"],BFormGroup:_["a"],BFormInput:B["a"],BFormSelect:$["a"],VueGoodTable:z["a"]},directives:{Ripple:T["a"]},props:{showLoading:{type:Boolean,required:!0},tableColumns:{type:Array,default:[]},fetchAll:{type:Function,required:!0},itemsCount:{type:Number,required:!0},noHeader:{type:Boolean,default:!1},noHeaderAdd:{type:Boolean,default:!1},noHeaderRefresh:{type:Boolean,default:!1},noManyRemove:{type:Boolean,default:!1}},setup:function(t){var e=Object(A["ref"])({sort:[{field:"",type:""}],page:1,perPage:10,searchTerm:""}),n=[1,5,10,20,30,100],a=Object(A["ref"])([]);t.fetchAll(e.value,(function(t){return a.value=t}));var r=function(){t.fetchAll(e.value,(function(t){return a.value=t}))},c=function(){t.fetchAll(e.value,(function(t){return a.value=t}))},o=function(n){e.value=Object.assign({},e.value,{sort:n}),t.fetchAll(e.value,(function(t){return a.value=t}))},i=function(){t.fetchAll(e.value,(function(t){return a.value=t}))};return{serverParams:e,perPageOptions:n,rows:a,onPageChange:r,onSortChange:o,onPerPageChange:c,onSearch:i}}},I=L,M=(n("35d1"),n("2877")),D=Object(M["a"])(I,a,r,!1,null,null,null);e["a"]=D.exports},"4ae1":function(t,e,n){},7386:function(t,e,n){"use strict";n.d(e,"a",(function(){return p})),n.d(e,"b",(function(){return m})),n.d(e,"c",(function(){return h})),n.d(e,"d",(function(){return v}));var a=n("2b0e"),r=n("b42e"),c=n("a723"),o=n("d82f"),i=n("cf75"),s=n("fa73"),l=n("aa0d");function u(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,a)}return n}function d(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?u(Object(n),!0).forEach((function(e){b(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):u(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function b(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var f=function(t,e){var n=Object(s["b"])(t),u="BIcon".concat(Object(s["e"])(t)),b="bi-".concat(n),f=n.replace(/-/g," "),p=Object(s["g"])(e||"");return a["default"].extend({name:u,functional:!0,props:d(d({},Object(o["j"])(l["b"],["content","stacked"])),{},{stacked:Object(i["c"])(c["g"],!1)}),render:function(t,e){var n=e.data,a=e.props;return t(l["a"],Object(r["a"])({props:{title:f},attrs:{"aria-label":f}},n,{staticClass:b,props:d(d({},a),{},{content:p})}))}})},p=f("Blank",""),m=f("Dash",'<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>'),h=f("PersonFill",'<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>'),v=f("Plus",'<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>');
/*!
 * BootstrapVue Icons, generated from Bootstrap Icons 1.2.1
 *
 * @link https://icons.getbootstrap.com/
 * @license MIT
 * https://github.com/twbs/icons/blob/master/LICENSE.md
 */},a15b9:function(t,e,n){"use strict";var a=n("23e7"),r=n("44ad"),c=n("fc6a"),o=n("a640"),i=[].join,s=r!=Object,l=o("join",",");a({target:"Array",proto:!0,forced:s||!l},{join:function(t){return i.call(c(this),void 0===t?",":t)}})},aa0d:function(t,e,n){"use strict";n.d(e,"b",(function(){return m})),n.d(e,"a",(function(){return h}));var a=n("2b0e"),r=n("b42e"),c=n("c637"),o=n("a723"),i=n("6c06"),s=n("7b1e"),l=n("a8c8"),u=n("3a58"),d=n("cf75");function b(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var f={viewBox:"0 0 16 16",width:"1em",height:"1em",focusable:"false",role:"img","aria-label":"icon"},p={width:null,height:null,focusable:null,role:null,"aria-label":null},m={animation:Object(d["c"])(o["r"]),content:Object(d["c"])(o["r"]),flipH:Object(d["c"])(o["g"],!1),flipV:Object(d["c"])(o["g"],!1),fontScale:Object(d["c"])(o["o"],1),rotate:Object(d["c"])(o["o"],0),scale:Object(d["c"])(o["o"],1),shiftH:Object(d["c"])(o["o"],0),shiftV:Object(d["c"])(o["o"],0),stacked:Object(d["c"])(o["g"],!1),title:Object(d["c"])(o["r"]),variant:Object(d["c"])(o["r"])},h=a["default"].extend({name:c["P"],functional:!0,props:m,render:function(t,e){var n,a=e.data,c=e.props,o=e.children,d=c.animation,m=c.content,h=c.flipH,v=c.flipV,g=c.stacked,O=c.title,j=c.variant,y=Object(l["c"])(Object(u["a"])(c.fontScale,1),0)||1,w=Object(l["c"])(Object(u["a"])(c.scale,1),0)||1,C=Object(u["a"])(c.rotate,0),x=Object(u["a"])(c.shiftH,0),P=Object(u["a"])(c.shiftV,0),S=h||v||1!==w,k=S||C,_=x||P,B=!Object(s["n"])(m),$=[k?"translate(8 8)":null,S?"scale(".concat((h?-1:1)*w," ").concat((v?-1:1)*w,")"):null,C?"rotate(".concat(C,")"):null,k?"translate(-8 -8)":null].filter(i["a"]),A=t("g",{attrs:{transform:$.join(" ")||null},domProps:B?{innerHTML:m||""}:{}},o);_&&(A=t("g",{attrs:{transform:"translate(".concat(16*x/16," ").concat(-16*P/16,")")}},[A])),g&&(A=t("g",{},[A]));var z=O?t("title",O):null;return t("svg",Object(r["a"])({staticClass:"b-icon bi",class:(n={},b(n,"text-".concat(j),j),b(n,"b-icon-animation-".concat(d),d),n),attrs:f,style:g?{}:{fontSize:1===y?null:"".concat(100*y,"%")}},a,g?{attrs:p}:{},{attrs:{xmlns:g?null:"http://www.w3.org/2000/svg",fill:"currentColor"}}),[z,A])}})},c740:function(t,e,n){"use strict";var a=n("23e7"),r=n("b727").findIndex,c=n("44d2"),o=n("ae40"),i="findIndex",s=!0,l=o(i);i in[]&&Array(1)[i]((function(){s=!1})),a({target:"Array",proto:!0,forced:s||!l},{findIndex:function(t){return r(this,t,arguments.length>1?arguments[1]:void 0)}}),c(i)},d81d:function(t,e,n){"use strict";var a=n("23e7"),r=n("b727").map,c=n("1dde"),o=n("ae40"),i=c("map"),s=o("map");a({target:"Array",proto:!0,forced:!i||!s},{map:function(t){return r(this,t,arguments.length>1?arguments[1]:void 0)}})},e8a3:function(t,e,n){"use strict";n.d(e,"a",(function(){return D}));var a=n("2b0e"),r=n("c637"),c=n("0056"),o=n("a723"),i=n("9b76"),s=n("7b1e"),l=n("3a58"),u=n("d82f"),d=n("cf75"),b=n("4a38"),f=n("8c18"),p=n("b42e"),m=n("992e"),h=n("fa73"),v=n("7386"),g=n("aa0d");function O(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,a)}return n}function j(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?O(Object(n),!0).forEach((function(e){y(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):O(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function y(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var w=function t(e,n){if(!e)return null;var a=(e.$options||{}).components,r=a[n];return r||t(e.$parent,n)},C=Object(d["d"])(Object(u["m"])(j(j({},Object(u["j"])(g["b"],["content","stacked"])),{},{icon:Object(d["c"])(o["r"]),stacked:Object(d["c"])(o["g"],!1)})),r["O"]),x=a["default"].extend({name:r["O"],functional:!0,props:C,render:function(t,e){var n=e.data,a=e.props,r=e.parent,c=Object(h["e"])(Object(h["g"])(a.icon||"")).replace(m["j"],"");return t(c&&w(r,"BIcon".concat(c))||v["a"],Object(p["a"])(n,{props:j(j({},a),{},{icon:null})}))}}),P=n("1947"),S=n("aa59");function k(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,a)}return n}function _(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?k(Object(n),!0).forEach((function(e){B(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):k(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function B(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var $="b-avatar",A=["sm",null,"lg"],z=.4,T=.7*z,L=function(t){return t=Object(s["l"])(t)&&Object(s["i"])(t)?Object(l["a"])(t,0):t,Object(s["h"])(t)?"".concat(t,"px"):t||null},I=Object(u["j"])(S["b"],["active","event","routerTag"]),M=Object(d["d"])(Object(u["m"])(_(_({},I),{},{alt:Object(d["c"])(o["r"],"avatar"),ariaLabel:Object(d["c"])(o["r"]),badge:Object(d["c"])(o["j"],!1),badgeLeft:Object(d["c"])(o["g"],!1),badgeOffset:Object(d["c"])(o["r"]),badgeTop:Object(d["c"])(o["g"],!1),badgeVariant:Object(d["c"])(o["r"],"primary"),button:Object(d["c"])(o["g"],!1),buttonType:Object(d["c"])(o["r"],"button"),icon:Object(d["c"])(o["r"]),rounded:Object(d["c"])(o["j"],!1),size:Object(d["c"])(o["o"]),square:Object(d["c"])(o["g"],!1),src:Object(d["c"])(o["r"]),text:Object(d["c"])(o["r"]),variant:Object(d["c"])(o["r"],"secondary")})),r["b"]),D=a["default"].extend({name:r["b"],mixins:[f["a"]],inject:{bvAvatarGroup:{default:null}},props:M,data:function(){return{localSrc:this.src||null}},computed:{computedSize:function(){var t=this.bvAvatarGroup;return L(t?t.size:this.size)},computedVariant:function(){var t=this.bvAvatarGroup;return t&&t.variant?t.variant:this.variant},computedRounded:function(){var t=this.bvAvatarGroup,e=!(!t||!t.square)||this.square,n=t&&t.rounded?t.rounded:this.rounded;return e?"0":""===n||(n||"circle")},fontStyle:function(){var t=this.computedSize,e=-1===A.indexOf(t)?"calc(".concat(t," * ").concat(z,")"):null;return e?{fontSize:e}:{}},marginStyle:function(){var t=this.computedSize,e=this.bvAvatarGroup,n=e?e.overlapScale:0,a=t&&n?"calc(".concat(t," * -").concat(n,")"):null;return a?{marginLeft:a,marginRight:a}:{}},badgeStyle:function(){var t=this.computedSize,e=this.badgeTop,n=this.badgeLeft,a=this.badgeOffset,r=a||"0px";return{fontSize:-1===A.indexOf(t)?"calc(".concat(t," * ").concat(T," )"):null,top:e?r:null,bottom:e?null:r,left:n?r:null,right:n?null:r}}},watch:{src:function(t,e){t!==e&&(this.localSrc=t||null)}},methods:{onImgError:function(t){this.localSrc=null,this.$emit(c["t"],t)},onClick:function(t){this.$emit(c["f"],t)}},render:function(t){var e,n=this.computedVariant,a=this.disabled,r=this.computedRounded,c=this.icon,o=this.localSrc,s=this.text,l=this.fontStyle,u=this.marginStyle,f=this.computedSize,p=this.button,m=this.buttonType,h=this.badge,g=this.badgeVariant,O=this.badgeStyle,j=!p&&Object(b["d"])(this),y=p?P["a"]:j?S["a"]:"span",w=this.alt,C=this.ariaLabel||null,k=null;this.hasNormalizedSlot()?k=t("span",{staticClass:"b-avatar-custom"},[this.normalizeSlot()]):o?(k=t("img",{style:n?{}:{width:"100%",height:"100%"},attrs:{src:o,alt:w},on:{error:this.onImgError}}),k=t("span",{staticClass:"b-avatar-img"},[k])):k=c?t(x,{props:{icon:c},attrs:{"aria-hidden":"true",alt:w}}):s?t("span",{staticClass:"b-avatar-text",style:l},[t("span",s)]):t(v["c"],{attrs:{"aria-hidden":"true",alt:w}});var z=t(),T=this.hasNormalizedSlot(i["c"]);if(h||""===h||T){var L=!0===h?"":h;z=t("span",{staticClass:"b-avatar-badge",class:B({},"badge-".concat(g),g),style:O},[T?this.normalizeSlot(i["c"]):L])}var M={staticClass:$,class:(e={},B(e,"".concat($,"-").concat(f),f&&-1!==A.indexOf(f)),B(e,"badge-".concat(n),!p&&n),B(e,"rounded",!0===r),B(e,"rounded-".concat(r),r&&!0!==r),B(e,"disabled",a),e),style:_(_({},u),{},{width:f,height:f}),attrs:{"aria-label":C||null},props:p?{variant:n,disabled:a,type:m}:j?Object(d["e"])(I,this):{},on:p||j?{click:this.onClick}:{}};return t(y,M,[k,z])}})},fc45:function(t,e,n){"use strict";n("19a2")}}]);
//# sourceMappingURL=chunk-024425a4.e3223e1e.js.map