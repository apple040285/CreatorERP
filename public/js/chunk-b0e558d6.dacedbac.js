(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-b0e558d6","chunk-329816af"],{"02ca":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("b-tabs",{attrs:{"content-class":"col-12 mt-1 mt-md-0",pills:"","nav-wrapper-class":"col-12"}},[a("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[a("feather-icon",{staticClass:"mr-50",attrs:{icon:"FileTextIcon",size:"18"}}),a("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Basic Information")))])]},proxy:!0}])},[t.data?a("basic-information",{attrs:{"basic-information":t.data}}):t._e()],1),a("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[a("feather-icon",{staticClass:"mr-50",attrs:{icon:"PackageIcon",size:"18"}}),a("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("ProductModal.warehouseInformation")))])]},proxy:!0}])},[t.storehouseListData?a("storehouse-list",{attrs:{"storehouse-list":t.storehouseListData}}):t._e()],1),a("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[a("feather-icon",{staticClass:"mr-50",attrs:{icon:"EditIcon",size:"18"}}),a("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Other Remark")))])]},proxy:!0}])},[t.data?a("other-remark",{attrs:{"other-remark":t.data}}):t._e()],1)],1)],1)},i=[],n=(a("e9c4"),a("7f80")),s=a("f902"),o=a("6190"),c=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("b-card",[a("b-card-body",[a("b-row",{staticClass:"my-2"},[a("b-col",{staticClass:"d-flex align-items-center justify-content-center mb-2 mb-md-0",attrs:{cols:"12",md:"5"}},[a("div",{staticClass:"d-flex align-items-center justify-content-center"},[a("b-img",{staticClass:"product-img",attrs:{src:"https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/demo-1/img/1.3b312012.png",alt:t.basicInformation.name,fluid:""}})],1)]),a("b-col",{attrs:{cols:"12",md:"7"}},[a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.code")}},[a("b-form-input",{attrs:{value:t.basicInformation.code,placeholder:t.$t("ProductList.code"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.name")}},[a("b-form-input",{attrs:{value:t.basicInformation.name,placeholder:t.$t("ProductList.name"),type:"text",readonly:""}})],1)],1)],1),a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.englishName")}},[a("b-form-input",{attrs:{value:t.basicInformation.alias,placeholder:t.$t("ProductList.englishName"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.invoiceName")}},[a("b-form-input",{attrs:{value:t.basicInformation.invoice_name,placeholder:t.$t("ProductList.invoiceName"),type:"text",readonly:""}})],1)],1)],1),a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.specification")}},[a("b-form-input",{attrs:{value:t.basicInformation.sku,placeholder:t.$t("ProductList.specification"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.category")}},[a("b-form-input",{attrs:{value:t.basicInformation.category&&t.basicInformation.category.name,placeholder:t.$t("ProductList.category"),type:"text",readonly:""}})],1)],1)],1),a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.unit")}},[a("b-form-input",{attrs:{value:t.basicInformation.unit,placeholder:t.$t("ProductList.unit"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.barcode")}},[a("b-form-input",{attrs:{value:t.basicInformation.barcode,placeholder:t.$t("ProductList.barcode"),type:"text",readonly:""}})],1)],1)],1),a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.averageCost")}},[a("b-form-input",{attrs:{value:t.basicInformation.average_cost,placeholder:t.$t("ProductList.averageCost"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.currentTotalCost")}},[a("b-form-input",{attrs:{value:t.basicInformation.current_total_cost,placeholder:t.$t("ProductList.currentTotalCost"),type:"text",readonly:""}})],1)],1)],1),a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("ProductList.price")}},[a("b-form-input",{attrs:{value:t.basicInformation.price,placeholder:t.$t("ProductList.price"),type:"text",readonly:""}})],1)],1)],1)],1)],1)],1)],1)},l=[],u=a("1947"),b=a("11de"),d=a("8226"),f=a("4797"),h=a("a15b"),p=a("b28b"),v=a("205f"),m=a("6197"),O=a("4918"),g={components:{BButton:u["a"],BForm:b["a"],BFormGroup:d["a"],BFormInput:f["a"],BRow:h["a"],BCol:p["a"],BCard:v["a"],BCardBody:m["a"],BImg:O["a"]},props:{basicInformation:{type:Object,default:function(){}}}},j=g,y=a("2877"),w=Object(y["a"])(j,c,l,!1,null,null,null),x=w.exports,T=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("b-card",[a("b-form",[a("b-row",[a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("created_by")}},[a("b-form-input",{attrs:{value:t.otherRemark.creator&&t.otherRemark.creator.name,placeholder:t.$t("created_by"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("created_at")}},[a("b-form-input",{attrs:{value:t.otherRemark.created_at,placeholder:t.$t("created_at"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("updated_by")}},[a("b-form-input",{attrs:{value:t.otherRemark.editor&&t.otherRemark.editor.name,placeholder:t.$t("updated_by"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("updated_at")}},[a("b-form-input",{attrs:{value:t.otherRemark.updated_at,placeholder:t.$t("updated_at"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("status")}},[a("b-form-input",{attrs:{value:t.$t(t.otherRemark.status),placeholder:t.$t("status"),type:"text",readonly:""}})],1)],1),a("b-col",{attrs:{cols:"6"}},[a("b-form-group",{attrs:{label:t.$t("remark")}},[a("b-form-textarea",{attrs:{placeholder:t.$t("remark"),rows:"3",value:t.otherRemark.remark,readonly:""}})],1)],1)],1)],1)],1)},k=[],$=a("9c7d"),_={components:{BButton:u["a"],BForm:b["a"],BFormGroup:d["a"],BFormInput:f["a"],BRow:h["a"],BCol:p["a"],BCard:v["a"],BFormTextarea:$["a"]},props:{otherRemark:{type:Object,default:function(){}}}},C=_,P=Object(y["a"])(C,T,k,!1,null,null,null),B=P.exports,I=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("b-row",[a("b-col",{attrs:{cols:"12"}},[a("b-card-code",{attrs:{title:t.$t("ProductModal.warehouseInformation")}},[a("div",{staticClass:"custom-search d-flex justify-content-end"},[a("b-form-group",[a("div",{staticClass:"d-flex align-items-center"},[a("b-form-input",{staticClass:"d-inline-block",attrs:{placeholder:t.$t("table.Search"),type:"text"},model:{value:t.storehouseList.searchTerm,callback:function(e){t.$set(t.storehouseList,"searchTerm",e)},expression:"storehouseList.searchTerm"}})],1)])],1),a("vue-good-table",{attrs:{columns:t.storehouseList.columns,rows:t.storehouseList.rows,"search-options":{enabled:!0,externalQuery:t.storehouseList.searchTerm},"pagination-options":{enabled:!0,perPage:t.storehouseList.pageLength}},scopedSlots:t._u([{key:"loadingContent",fn:function(){return[a("div",{staticClass:"text-center"},[a("b-spinner",{attrs:{variant:"primary",label:"Text Centered"}})],1)]},proxy:!0},{key:"table-column",fn:function(e){return["#"!==e.column.label?a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("ProductList."+e.column.label))+" ")]):t._e()]}},{key:"table-row",fn:function(e){return["id"===e.column.field?a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.row.originalIndex+1)+" ")]):a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.formattedRow[e.column.field])+" ")])]}},{key:"pagination-bottom",fn:function(e){return[a("div",{staticClass:"d-flex justify-content-between flex-wrap"},[a("div",{staticClass:"d-flex align-items-center mb-0 mt-1"},[a("span",{staticClass:"text-nowrap "},[t._v(" "+t._s(t.$t("table.Showing"))+" 1 "+t._s(t.$t("table.to"))+" ")]),a("b-form-select",{staticClass:"mx-1",attrs:{options:["5","10"]},on:{input:function(t){return e.perPageChanged({currentPerPage:t})}},model:{value:t.storehouseList.pageLength,callback:function(e){t.$set(t.storehouseList,"pageLength",e)},expression:"storehouseList.pageLength"}}),a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("table.of"))+" "+t._s(e.total)+" "+t._s(t.$t("table.entries"))+" ")])],1),a("div",[a("b-pagination",{staticClass:"mt-1 mb-0",attrs:{value:1,"total-rows":e.total,"per-page":t.storehouseList.pageLength,"first-number":"","last-number":"",align:"right","prev-class":"prev-item","next-class":"next-item"},on:{input:function(t){return e.pageChanged({currentPage:t})}},scopedSlots:t._u([{key:"prev-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronLeftIcon",size:"18"}})]},proxy:!0},{key:"next-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronRightIcon",size:"18"}})]},proxy:!0}],null,!0)})],1)])]}}])})],1)],1)],1)],1)},L=[],S=a("541c"),R=a("e98b"),z=a("26d2"),D=a("8361"),F=a("01e3"),A=a("f617"),E=a("e009"),N={components:{BCardCode:S["a"],BRow:h["a"],BCol:p["a"],BBadge:R["a"],VueGoodTable:A["a"],BPagination:z["a"],BFormGroup:d["a"],BForm:b["a"],BFormInput:f["a"],BFormSelect:D["a"],BButton:u["a"],BSpinner:F["a"]},directives:{Ripple:E["a"]},props:{storehouseList:{type:Object,default:function(){}}}},M=N,H=(a("2c06"),Object(y["a"])(M,I,L,!1,null,null,null)),K=H.exports,V={components:{BTabs:s["a"],BTab:o["a"],BasicInformation:x,OtherRemark:B,StorehouseList:K},data:function(){return{data:{},storehouseListData:{pageLength:10,searchTerm:"",columns:[{label:"#",field:"id",type:"number"},{label:"code",field:"code"},{label:"warehouse",field:"name"},{label:"stock",field:"pivot.stock",type:"number"},{label:"expectedToEnter",field:"expectedToEnter",type:"number"},{label:"predict",field:"predict",type:"number"},{label:"estimatedStock",field:"estimatedStock",type:"number"},{label:"safetyStock",field:"pivot.safety_stock",type:"number"}],rows:[]}}},mounted:function(){var t=this;this.$route.query.id&&n["a"].get("products/".concat(this.$route.query.id)).then((function(e){var a=e.data;t.data=a,t.storehouseListData.rows=JSON.parse(JSON.stringify(a.storehouses))})).catch((function(t){return console.error(t)}))}},q=V,G=Object(y["a"])(q,r,i,!1,null,null,null);e["default"]=G.exports},"11de":function(t,e,a){"use strict";a.d(e,"a",(function(){return l}));var r=a("2b0e"),i=a("b42e"),n=a("c637"),s=a("a723"),o=a("cf75"),c=Object(o["d"])({id:Object(o["c"])(s["r"]),inline:Object(o["c"])(s["g"],!1),novalidate:Object(o["c"])(s["g"],!1),validated:Object(o["c"])(s["g"],!1)},n["z"]),l=r["default"].extend({name:n["z"],functional:!0,props:c,render:function(t,e){var a=e.props,r=e.data,n=e.children;return t("form",Object(i["a"])(r,{class:{"form-inline":a.inline,"was-validated":a.validated},attrs:{id:a.id,novalidate:a.novalidate}}),n)}})},"2c06":function(t,e,a){"use strict";a("714b")},"59fb":function(t,e,a){"use strict";a.d(e,"b",(function(){return u})),a.d(e,"a",(function(){return b}));var r=a("2b0e"),i=a("b42e"),n=a("c637"),s=a("a723"),o=a("cf75");function c(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var l=function(t){return t="left"===t?"start":"right"===t?"end":t,"justify-content-".concat(t)},u=Object(o["d"])({align:Object(o["c"])(s["r"]),cardHeader:Object(o["c"])(s["g"],!1),fill:Object(o["c"])(s["g"],!1),justified:Object(o["c"])(s["g"],!1),pills:Object(o["c"])(s["g"],!1),small:Object(o["c"])(s["g"],!1),tabs:Object(o["c"])(s["g"],!1),tag:Object(o["c"])(s["r"],"ul"),vertical:Object(o["c"])(s["g"],!1)},n["cb"]),b=r["default"].extend({name:n["cb"],functional:!0,props:u,render:function(t,e){var a,r=e.props,n=e.data,s=e.children,o=r.tabs,u=r.pills,b=r.vertical,d=r.align,f=r.cardHeader;return t(r.tag,Object(i["a"])(n,{staticClass:"nav",class:(a={"nav-tabs":o,"nav-pills":u&&!o,"card-header-tabs":!b&&f&&o,"card-header-pills":!b&&f&&u&&!o,"flex-column":b,"nav-fill":!b&&r.fill,"nav-justified":!b&&r.justified},c(a,l(d),!b&&d),c(a,"small",r.small),a)}),s)}})},6190:function(t,e,a){"use strict";a.d(e,"a",(function(){return y}));var r,i,n=a("2b0e"),s=a("c637"),o=a("0056"),c=a("a723"),l=a("9b76"),u=a("d82f"),b=a("cf75"),d=a("90ef"),f=a("8c18"),h=a("ce2a");function p(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function v(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?p(Object(a),!0).forEach((function(e){m(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):p(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function m(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var O="active",g=o["L"]+O,j=Object(b["d"])(Object(u["m"])(v(v({},d["b"]),{},(r={},m(r,O,Object(b["c"])(c["g"],!1)),m(r,"buttonId",Object(b["c"])(c["r"])),m(r,"disabled",Object(b["c"])(c["g"],!1)),m(r,"lazy",Object(b["c"])(c["g"],!1)),m(r,"noBody",Object(b["c"])(c["g"],!1)),m(r,"tag",Object(b["c"])(c["r"],"div")),m(r,"title",Object(b["c"])(c["r"])),m(r,"titleItemClass",Object(b["c"])(c["e"])),m(r,"titleLinkAttributes",Object(b["c"])(c["p"])),m(r,"titleLinkClass",Object(b["c"])(c["e"])),r))),s["mb"]),y=n["default"].extend({name:s["mb"],mixins:[d["a"],f["a"]],inject:{bvTabs:{default:function(){return{}}}},props:j,data:function(){return{localActive:this[O]&&!this.disabled}},computed:{_isTab:function(){return!0},tabClasses:function(){var t=this.localActive,e=this.disabled;return[{active:t,disabled:e,"card-body":this.bvTabs.card&&!this.noBody},t?this.bvTabs.activeTabClass:null]},controlledBy:function(){return this.buttonId||this.safeId("__BV_tab_button__")},computedNoFade:function(){return!this.bvTabs.fade},computedLazy:function(){return this.bvTabs.lazy||this.lazy}},watch:(i={},m(i,O,(function(t,e){t!==e&&(t?this.activate():this.deactivate()||this.$emit(g,this.localActive))})),m(i,"disabled",(function(t,e){if(t!==e){var a=this.bvTabs.firstTab;t&&this.localActive&&a&&(this.localActive=!1,a())}})),m(i,"localActive",(function(t){this.$emit(g,t)})),i),mounted:function(){this.registerTab()},updated:function(){var t=this.bvTabs.updateButton;t&&this.hasNormalizedSlot(l["K"])&&t(this)},beforeDestroy:function(){this.unregisterTab()},methods:{registerTab:function(){var t=this.bvTabs.registerTab;t&&t(this)},unregisterTab:function(){var t=this.bvTabs.unregisterTab;t&&t(this)},activate:function(){var t=this.bvTabs.activateTab;return!(!t||this.disabled)&&t(this)},deactivate:function(){var t=this.bvTabs.deactivateTab;return!(!t||!this.localActive)&&t(this)}},render:function(t){var e=this.localActive,a=t(this.tag,{staticClass:"tab-pane",class:this.tabClasses,directives:[{name:"show",value:e}],attrs:{role:"tabpanel",id:this.safeId(),"aria-hidden":e?"false":"true","aria-labelledby":this.controlledBy||null},ref:"panel"},[e||!this.computedLazy?this.normalizeSlot():t()]);return t(h["a"],{props:{mode:"out-in",noFade:this.computedNoFade}},[a])}})},"714b":function(t,e,a){},"9c7d":function(t,e,a){"use strict";a.d(e,"a",(function(){return F}));var r=a("2b0e"),i=a("c637"),n=a("a723"),s=a("906c"),o=a("7b1e"),c=a("a8c8"),l=a("3a58"),u=a("d82f"),b=a("cf75"),d=a("dde7"),f=a("06d9"),h=a("ad47"),p=a("d520"),v=a("40fc"),m=a("1f1e"),O=a("90ef"),g=a("602d"),j=a("bc9a"),y=a("992e"),w=a("3c21");function x(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function T(t,e){for(var a=0;a<e.length;a++){var r=e[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function k(t,e,a){return e&&T(t.prototype,e),a&&T(t,a),t}var $="__bv__visibility_observer",_=function(){function t(e,a,r){x(this,t),this.el=e,this.callback=a.callback,this.margin=a.margin||0,this.once=a.once||!1,this.observer=null,this.visible=void 0,this.doneOnce=!1,this.createObserver(r)}return k(t,[{key:"createObserver",value:function(t){var e=this;if(this.observer&&this.stop(),!this.doneOnce&&Object(o["f"])(this.callback)){try{this.observer=new IntersectionObserver(this.handler.bind(this),{root:null,rootMargin:this.margin,threshold:0})}catch(a){return this.doneOnce=!0,this.observer=void 0,void this.callback(null)}t.context.$nextTick((function(){Object(s["z"])((function(){e.observer&&e.observer.observe(e.el)}))}))}}},{key:"handler",value:function(t){var e=t?t[0]:{},a=Boolean(e.isIntersecting||e.intersectionRatio>0);a!==this.visible&&(this.visible=a,this.callback(a),this.once&&this.visible&&(this.doneOnce=!0,this.stop()))}},{key:"stop",value:function(){this.observer&&this.observer.disconnect(),this.observer=null}}]),t}(),C=function(t){var e=t[$];e&&e.stop&&e.stop(),delete t[$]},P=function(t,e,a){var r=e.value,i=e.modifiers,n={margin:"0px",once:!1,callback:r};Object(u["h"])(i).forEach((function(t){y["d"].test(t)?n.margin="".concat(t,"px"):"once"===t.toLowerCase()&&(n.once=!0)})),C(t),t[$]=new _(t,n,a),t[$]._prevModifiers=Object(u["b"])(i)},B=function(t,e,a){var r=e.value,i=e.oldValue,n=e.modifiers;n=Object(u["b"])(n),!t||r===i&&t[$]&&Object(w["a"])(n,t[$]._prevModifiers)||P(t,{value:r,modifiers:n},a)},I=function(t){C(t)},L={bind:P,componentUpdated:B,unbind:I};function S(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function R(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?S(Object(a),!0).forEach((function(e){z(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):S(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function z(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var D=Object(b["d"])(Object(u["m"])(R(R(R(R(R(R({},O["b"]),d["b"]),h["b"]),p["b"]),v["b"]),{},{maxRows:Object(b["c"])(n["o"]),noAutoShrink:Object(b["c"])(n["g"],!1),noResize:Object(b["c"])(n["g"],!1),rows:Object(b["c"])(n["o"],2),wrap:Object(b["c"])(n["r"],"soft")})),i["M"]),F=r["default"].extend({name:i["M"],directives:{"b-visible":L},mixins:[j["a"],O["a"],g["a"],d["a"],h["a"],p["a"],v["a"],f["a"],m["a"]],props:D,data:function(){return{heightInPx:null}},computed:{computedStyle:function(){var t={resize:!this.computedRows||this.noResize?"none":null};return this.computedRows||(t.height=this.heightInPx,t.overflowY="scroll"),t},computedMinRows:function(){return Object(c["c"])(Object(l["b"])(this.rows,2),2)},computedMaxRows:function(){return Object(c["c"])(this.computedMinRows,Object(l["b"])(this.maxRows,0))},computedRows:function(){return this.computedMinRows===this.computedMaxRows?this.computedMinRows:null},computedAttrs:function(){var t=this.disabled,e=this.required;return{id:this.safeId(),name:this.name||null,form:this.form||null,disabled:t,placeholder:this.placeholder||null,required:e,autocomplete:this.autocomplete||null,readonly:this.readonly||this.plaintext,rows:this.computedRows,wrap:this.wrap||null,"aria-required":this.required?"true":null,"aria-invalid":this.computedAriaInvalid}},computedListeners:function(){return R(R({},this.bvListeners),{},{input:this.onInput,change:this.onChange,blur:this.onBlur})}},watch:{localValue:function(){this.setHeight()}},mounted:function(){this.setHeight()},methods:{visibleCallback:function(t){t&&this.$nextTick(this.setHeight)},setHeight:function(){var t=this;this.$nextTick((function(){Object(s["z"])((function(){t.heightInPx=t.computeHeight()}))}))},computeHeight:function(){if(this.$isServer||!Object(o["g"])(this.computedRows))return null;var t=this.$el;if(!Object(s["s"])(t))return null;var e=Object(s["k"])(t),a=Object(l["a"])(e.lineHeight,1),r=Object(l["a"])(e.borderTopWidth,0)+Object(l["a"])(e.borderBottomWidth,0),i=Object(l["a"])(e.paddingTop,0)+Object(l["a"])(e.paddingBottom,0),n=r+i,u=a*this.computedMinRows+n,b=Object(s["l"])(t,"height")||e.height;Object(s["D"])(t,"height","auto");var d=t.scrollHeight;Object(s["D"])(t,"height",b);var f=Object(c["c"])((d-i)/a,2),h=Object(c["d"])(Object(c["c"])(f,this.computedMinRows),this.computedMaxRows),p=Object(c["c"])(Object(c["a"])(h*a+n),u);return this.noAutoShrink&&Object(l["a"])(b,0)>p?b:"".concat(p,"px")}},render:function(t){return t("textarea",{class:this.computedClass,style:this.computedStyle,directives:[{name:"b-visible",value:this.visibleCallback,modifiers:{640:!0}}],attrs:this.computedAttrs,domProps:{value:this.localValue},on:this.computedListeners,ref:"input"})}})},e98b:function(t,e,a){"use strict";a.d(e,"a",(function(){return v}));var r=a("2b0e"),i=a("b42e"),n=a("c637"),s=a("a723"),o=a("d82f"),c=a("cf75"),l=a("4a38"),u=a("aa59");function b(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function d(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?b(Object(a),!0).forEach((function(e){f(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):b(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function f(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var h=Object(o["j"])(u["b"],["event","routerTag"]);delete h.href.default,delete h.to.default;var p=Object(c["d"])(Object(o["m"])(d(d({},h),{},{pill:Object(c["c"])(s["g"],!1),tag:Object(c["c"])(s["r"],"span"),variant:Object(c["c"])(s["r"],"secondary")})),n["c"]),v=r["default"].extend({name:n["c"],functional:!0,props:p,render:function(t,e){var a=e.props,r=e.data,n=e.children,s=a.active,o=a.disabled,b=Object(l["d"])(a),d=b?u["a"]:a.tag,f=a.variant||"secondary";return t(d,Object(i["a"])(r,{staticClass:"badge",class:["badge-".concat(f),{"badge-pill":a.pill,active:s,disabled:o}],props:b?Object(c["e"])(h,a):{}}),n)}})},f902:function(t,e,a){"use strict";a.d(e,"a",(function(){return H}));var r,i=a("2b0e"),n=a("2f79"),s=a("c637"),o=a("e863"),c=a("0056"),l=a("9bfa"),u=a("a723"),b=a("9b76"),d=a("2326"),f=a("6d40"),h=a("906c"),p=a("6b77"),v=a("6c06"),m=a("7b1e"),O=a("3c21"),g=a("a8c8"),j=a("58f2"),y=a("3a58"),w=a("d82f"),x=a("47df"),T=a("cf75"),k=function(t,e){return t.map((function(t,e){return[e,t]})).sort(function(t,e){return this(t[1],e[1])||t[0]-e[0]}.bind(e)).map((function(t){return t[1]}))},$=a("90ef"),_=a("8c18"),C=a("aa59"),P=a("59fb");function B(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function I(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?B(Object(a),!0).forEach((function(e){L(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):B(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function L(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var S=Object(j["a"])("value",{type:u["m"]}),R=S.mixin,z=S.props,D=S.prop,F=S.event,A=function(t){return!t.disabled},E=i["default"].extend({name:s["qb"],inject:{bvTabs:{default:function(){return{}}}},props:{controls:Object(T["c"])(u["r"]),id:Object(T["c"])(u["r"]),noKeyNav:Object(T["c"])(u["g"],!1),posInSet:Object(T["c"])(u["m"]),setSize:Object(T["c"])(u["m"]),tab:Object(T["c"])(),tabIndex:Object(T["c"])(u["m"])},methods:{focus:function(){Object(h["d"])(this.$refs.link)},handleEvt:function(t){if(!this.tab.disabled){var e=t.type,a=t.keyCode,r=t.shiftKey;"click"===e||"keydown"===e&&a===l["j"]?(Object(p["f"])(t),this.$emit(c["f"],t)):"keydown"!==e||this.noKeyNav||(-1!==[l["k"],l["f"],l["e"]].indexOf(a)?(Object(p["f"])(t),r||a===l["e"]?this.$emit(c["o"],t):this.$emit(c["C"],t)):-1!==[l["a"],l["i"],l["b"]].indexOf(a)&&(Object(p["f"])(t),r||a===l["b"]?this.$emit(c["v"],t):this.$emit(c["y"],t)))}}},render:function(t){var e=this.id,a=this.tabIndex,r=this.setSize,i=this.posInSet,n=this.controls,s=this.handleEvt,o=this.tab,c=o.title,l=o.localActive,u=o.disabled,d=o.titleItemClass,f=o.titleLinkClass,h=o.titleLinkAttributes,p=t(C["a"],{staticClass:"nav-link",class:[{active:l&&!u,disabled:u},f,l?this.bvTabs.activeNavItemClass:null],props:{disabled:u},attrs:I(I({},h),{},{id:e,role:"tab",tabindex:a,"aria-selected":l&&!u?"true":"false","aria-setsize":r,"aria-posinset":i,"aria-controls":n}),on:{click:s,keydown:s},ref:"link"},[this.tab.normalizeSlot(b["K"])||c]);return t("li",{staticClass:"nav-item",class:[d],attrs:{role:"presentation"}},[p])}}),N=Object(w["j"])(P["b"],["tabs","isNavBar","cardHeader"]),M=Object(T["d"])(Object(w["m"])(I(I(I(I({},$["b"]),z),N),{},{activeNavItemClass:Object(T["c"])(u["e"]),activeTabClass:Object(T["c"])(u["e"]),card:Object(T["c"])(u["g"],!1),contentClass:Object(T["c"])(u["e"]),end:Object(T["c"])(u["g"],!1),lazy:Object(T["c"])(u["g"],!1),navClass:Object(T["c"])(u["e"]),navWrapperClass:Object(T["c"])(u["e"]),noFade:Object(T["c"])(u["g"],!1),noKeyNav:Object(T["c"])(u["g"],!1),noNavStyle:Object(T["c"])(u["g"],!1),tag:Object(T["c"])(u["r"],"div")})),s["pb"]),H=i["default"].extend({name:s["pb"],mixins:[$["a"],R,_["a"]],provide:function(){return{bvTabs:this}},props:M,data:function(){return{currentTab:Object(y["b"])(this[D],-1),tabs:[],registeredTabs:[]}},computed:{fade:function(){return!this.noFade},localNavClass:function(){var t=[];return this.card&&this.vertical&&t.push("card-header","h-100","border-bottom-0","rounded-0"),[].concat(t,[this.navClass])}},watch:(r={},L(r,D,(function(t,e){if(t!==e){t=Object(y["b"])(t,-1),e=Object(y["b"])(e,0);var a=this.tabs[t];a&&!a.disabled?this.activateTab(a):t<e?this.previousTab():this.nextTab()}})),L(r,"currentTab",(function(t){var e=-1;this.tabs.forEach((function(a,r){r!==t||a.disabled?a.localActive=!1:(a.localActive=!0,e=r)})),this.$emit(F,e)})),L(r,"tabs",(function(t,e){var a=this;Object(O["a"])(t.map((function(t){return t[n["a"]]})),e.map((function(t){return t[n["a"]]})))||this.$nextTick((function(){a.$emit(c["e"],t.slice(),e.slice())}))})),L(r,"registeredTabs",(function(){this.updateTabs()})),r),created:function(){this.$_observer=null},mounted:function(){this.setObserver(!0)},beforeDestroy:function(){this.setObserver(!1),this.tabs=[]},methods:{registerTab:function(t){Object(d["a"])(this.registeredTabs,t)||this.registeredTabs.push(t)},unregisterTab:function(t){this.registeredTabs=this.registeredTabs.slice().filter((function(e){return e!==t}))},setObserver:function(){var t=this,e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];if(this.$_observer&&this.$_observer.disconnect(),this.$_observer=null,e){var a=function(){t.$nextTick((function(){Object(h["z"])((function(){t.updateTabs()}))}))};this.$_observer=Object(x["a"])(this.$refs.content,a,{childList:!0,subtree:!1,attributes:!0,attributeFilter:["id"]})}},getTabs:function(){var t=this.registeredTabs.filter((function(t){return 0===t.$children.filter((function(t){return t._isTab})).length})),e=[];if(o["f"]&&t.length>0){var a=t.map((function(t){return"#".concat(t.safeId())})).join(", ");e=Object(h["B"])(a,this.$el).map((function(t){return t.id})).filter(v["a"])}return k(t,(function(t,a){return e.indexOf(t.safeId())-e.indexOf(a.safeId())}))},updateTabs:function(){var t=this.getTabs(),e=t.indexOf(t.slice().reverse().find((function(t){return t.localActive&&!t.disabled})));if(e<0){var a=this.currentTab;a>=t.length?e=t.indexOf(t.slice().reverse().find(A)):t[a]&&!t[a].disabled&&(e=a)}e<0&&(e=t.indexOf(t.find(A))),t.forEach((function(t,a){t.localActive=a===e})),this.tabs=t,this.currentTab=e},getButtonForTab:function(t){return(this.$refs.buttons||[]).find((function(e){return e.tab===t}))},updateButton:function(t){var e=this.getButtonForTab(t);e&&e.$forceUpdate&&e.$forceUpdate()},activateTab:function(t){var e=this.currentTab,a=this.tabs,r=!1;if(t){var i=a.indexOf(t);if(i!==e&&i>-1&&!t.disabled){var n=new f["a"](c["a"],{cancelable:!0,vueTarget:this,componentId:this.safeId()});this.$emit(n.type,i,e,n),n.defaultPrevented||(this.currentTab=i,r=!0)}}return r||this[D]===e||this.$emit(F,e),r},deactivateTab:function(t){return!!t&&this.activateTab(this.tabs.filter((function(e){return e!==t})).find(A))},focusButton:function(t){var e=this;this.$nextTick((function(){Object(h["d"])(e.getButtonForTab(t))}))},emitTabClick:function(t,e){Object(m["d"])(e)&&t&&t.$emit&&!t.disabled&&t.$emit(c["f"],e)},clickTab:function(t,e){this.activateTab(t),this.emitTabClick(t,e)},firstTab:function(t){var e=this.tabs.find(A);this.activateTab(e)&&t&&(this.focusButton(e),this.emitTabClick(e,t))},previousTab:function(t){var e=Object(g["c"])(this.currentTab,0),a=this.tabs.slice(0,e).reverse().find(A);this.activateTab(a)&&t&&(this.focusButton(a),this.emitTabClick(a,t))},nextTab:function(t){var e=Object(g["c"])(this.currentTab,-1),a=this.tabs.slice(e+1).find(A);this.activateTab(a)&&t&&(this.focusButton(a),this.emitTabClick(a,t))},lastTab:function(t){var e=this.tabs.slice().reverse().find(A);this.activateTab(e)&&t&&(this.focusButton(e),this.emitTabClick(e,t))}},render:function(t){var e=this,a=this.align,r=this.card,i=this.end,s=this.fill,o=this.firstTab,l=this.justified,u=this.lastTab,d=this.nextTab,f=this.noKeyNav,h=this.noNavStyle,p=this.pills,v=this.previousTab,m=this.small,O=this.tabs,g=this.vertical,j=O.find((function(t){return t.localActive&&!t.disabled})),y=O.find((function(t){return!t.disabled})),w=O.map((function(a,r){var i,s=a.safeId,l=null;return f||(l=-1,(a===j||!j&&a===y)&&(l=null)),t(E,{props:{controls:s?s():null,id:a.controlledBy||(s?s("_BV_tab_button_"):null),noKeyNav:f,posInSet:r+1,setSize:O.length,tab:a,tabIndex:l},on:(i={},L(i,c["f"],(function(t){e.clickTab(a,t)})),L(i,c["o"],o),L(i,c["C"],v),L(i,c["y"],d),L(i,c["v"],u),i),key:a[n["a"]]||r,ref:"buttons",refInFor:!0})})),x=t(P["a"],{class:this.localNavClass,attrs:{role:"tablist",id:this.safeId("_BV_tab_controls_")},props:{fill:s,justified:l,align:a,tabs:!h&&!p,pills:!h&&p,vertical:g,small:m,cardHeader:r&&!g},ref:"nav"},[this.normalizeSlot(b["I"])||t(),w,this.normalizeSlot(b["H"])||t()]);x=t("div",{class:[{"card-header":r&&!g&&!i,"card-footer":r&&!g&&i,"col-auto":g},this.navWrapperClass],key:"bv-tabs-nav"},[x]);var T=this.normalizeSlot()||[],k=t();0===T.length&&(k=t("div",{class:["tab-pane","active",{"card-body":r}],key:"bv-empty-tab"},this.normalizeSlot(b["k"])));var $=t("div",{staticClass:"tab-content",class:[{col:g},this.contentClass],attrs:{id:this.safeId("_BV_tab_container_")},key:"bv-content",ref:"content"},[T,k]);return t(this.tag,{staticClass:"tabs",class:{row:g,"no-gutters":g&&r},attrs:{id:this.safeId()}},[i?$:t(),x,i?t():$])}})}}]);
//# sourceMappingURL=chunk-b0e558d6.dacedbac.js.map