(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7c1b2674","chunk-329816af"],{"10f6":function(t,e,r){"use strict";r.d(e,"a",(function(){return a}));var a={inserted:function(t,e){var r="".concat(t.offsetHeight,"px");e.modifiers.appear?(t.style.overflow="hidden",t.style.maxHeight="0px",t.style.opacity=0,setTimeout((function(){t.style.maxHeight=r,t.style.opacity=1,setTimeout((function(){t.style.overflow="unset"}),300)}),100)):t.style.maxHeight=r},unbind:function(t){void 0!==t.style&&(t.style.overflow="hidden",t.style.maxHeight="0px",t.style.opacity=0)}}},"11de":function(t,e,r){"use strict";r.d(e,"a",(function(){return l}));var a=r("2b0e"),n=r("b42e"),i=r("c637"),o=r("a723"),s=r("cf75"),c=Object(s["d"])({id:Object(s["c"])(o["r"]),inline:Object(s["c"])(o["g"],!1),novalidate:Object(s["c"])(o["g"],!1),validated:Object(s["c"])(o["g"],!1)},i["z"]),l=a["default"].extend({name:i["z"],functional:!0,props:c,render:function(t,e){var r=e.props,a=e.data,i=e.children;return t("form",Object(n["a"])(a,{class:{"form-inline":r.inline,"was-validated":r.validated},attrs:{id:r.id,novalidate:r.novalidate}}),i)}})},"30f3":function(t,e,r){},"59fb":function(t,e,r){"use strict";r.d(e,"b",(function(){return u})),r.d(e,"a",(function(){return b}));var a=r("2b0e"),n=r("b42e"),i=r("c637"),o=r("a723"),s=r("cf75");function c(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var l=function(t){return t="left"===t?"start":"right"===t?"end":t,"justify-content-".concat(t)},u=Object(s["d"])({align:Object(s["c"])(o["r"]),cardHeader:Object(s["c"])(o["g"],!1),fill:Object(s["c"])(o["g"],!1),justified:Object(s["c"])(o["g"],!1),pills:Object(s["c"])(o["g"],!1),small:Object(s["c"])(o["g"],!1),tabs:Object(s["c"])(o["g"],!1),tag:Object(s["c"])(o["r"],"ul"),vertical:Object(s["c"])(o["g"],!1)},i["cb"]),b=a["default"].extend({name:i["cb"],functional:!0,props:u,render:function(t,e){var r,a=e.props,i=e.data,o=e.children,s=a.tabs,u=a.pills,b=a.vertical,d=a.align,f=a.cardHeader;return t(a.tag,Object(n["a"])(i,{staticClass:"nav",class:(r={"nav-tabs":s,"nav-pills":u&&!s,"card-header-tabs":!b&&f&&s,"card-header-pills":!b&&f&&u&&!s,"flex-column":b,"nav-fill":!b&&a.fill,"nav-justified":!b&&a.justified},c(r,l(d),!b&&d),c(r,"small",a.small),r)}),o)}})},6190:function(t,e,r){"use strict";r.d(e,"a",(function(){return j}));var a,n,i=r("2b0e"),o=r("c637"),s=r("0056"),c=r("a723"),l=r("9b76"),u=r("d82f"),b=r("cf75"),d=r("90ef"),f=r("8c18"),p=r("ce2a");function h(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function m(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?h(Object(r),!0).forEach((function(e){v(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):h(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function v(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var y="active",g=s["L"]+y,O=Object(b["d"])(Object(u["m"])(m(m({},d["b"]),{},(a={},v(a,y,Object(b["c"])(c["g"],!1)),v(a,"buttonId",Object(b["c"])(c["r"])),v(a,"disabled",Object(b["c"])(c["g"],!1)),v(a,"lazy",Object(b["c"])(c["g"],!1)),v(a,"noBody",Object(b["c"])(c["g"],!1)),v(a,"tag",Object(b["c"])(c["r"],"div")),v(a,"title",Object(b["c"])(c["r"])),v(a,"titleItemClass",Object(b["c"])(c["e"])),v(a,"titleLinkAttributes",Object(b["c"])(c["p"])),v(a,"titleLinkClass",Object(b["c"])(c["e"])),a))),o["mb"]),j=i["default"].extend({name:o["mb"],mixins:[d["a"],f["a"]],inject:{bvTabs:{default:function(){return{}}}},props:O,data:function(){return{localActive:this[y]&&!this.disabled}},computed:{_isTab:function(){return!0},tabClasses:function(){var t=this.localActive,e=this.disabled;return[{active:t,disabled:e,"card-body":this.bvTabs.card&&!this.noBody},t?this.bvTabs.activeTabClass:null]},controlledBy:function(){return this.buttonId||this.safeId("__BV_tab_button__")},computedNoFade:function(){return!this.bvTabs.fade},computedLazy:function(){return this.bvTabs.lazy||this.lazy}},watch:(n={},v(n,y,(function(t,e){t!==e&&(t?this.activate():this.deactivate()||this.$emit(g,this.localActive))})),v(n,"disabled",(function(t,e){if(t!==e){var r=this.bvTabs.firstTab;t&&this.localActive&&r&&(this.localActive=!1,r())}})),v(n,"localActive",(function(t){this.$emit(g,t)})),n),mounted:function(){this.registerTab()},updated:function(){var t=this.bvTabs.updateButton;t&&this.hasNormalizedSlot(l["K"])&&t(this)},beforeDestroy:function(){this.unregisterTab()},methods:{registerTab:function(){var t=this.bvTabs.registerTab;t&&t(this)},unregisterTab:function(){var t=this.bvTabs.unregisterTab;t&&t(this)},activate:function(){var t=this.bvTabs.activateTab;return!(!t||this.disabled)&&t(this)},deactivate:function(){var t=this.bvTabs.deactivateTab;return!(!t||!this.localActive)&&t(this)}},render:function(t){var e=this.localActive,r=t(this.tag,{staticClass:"tab-pane",class:this.tabClasses,directives:[{name:"show",value:e}],attrs:{role:"tabpanel",id:this.safeId(),"aria-hidden":e?"false":"true","aria-labelledby":this.controlledBy||null},ref:"panel"},[e||!this.computedLazy?this.normalizeSlot():t()]);return t(p["a"],{props:{mode:"out-in",noFade:this.computedNoFade}},[r])}})},"785e":function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("b-tabs",{attrs:{"content-class":"col-12 mt-1 mt-md-0",pills:"","nav-wrapper-class":"col-12"}},[r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"FileTextIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Basic Information")))])]},proxy:!0}])},[t.data?r("basic-information",{attrs:{"basic-information":t.data}}):t._e()],1),r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"ShoppingCartIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("ProcurementVoucherModal.productInformation")))])]},proxy:!0}])},[t.productListData?r("product-list",{attrs:{"product-list":t.productListData}}):t._e()],1),r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"EditIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Other Remark")))])]},proxy:!0}])},[t.data?r("other-remark",{attrs:{"other-remark":t.data}}):t._e()],1)],1)],1)},n=[],i=(r("e9c4"),r("7f80")),o=r("f902"),s=r("6190"),c=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.procurementDate")}},[r("b-form-input",{attrs:{value:t.basicInformation.procurementDate,placeholder:t.$t("ProcurementVoucherList.procurementDate"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.procurementNo")}},[r("b-form-input",{attrs:{value:t.basicInformation.procurementNo,placeholder:t.$t("ProcurementVoucherList.procurementNo"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.manufacturer")}},[r("b-form-input",{attrs:{value:t.basicInformation.manufacturer,placeholder:t.$t("ProcurementVoucherList.manufacturer"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.currency")}},[r("b-form-input",{attrs:{value:t.basicInformation.currency,placeholder:t.$t("ProcurementVoucherList.currency"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.transferNo")}},[r("b-form-input",{attrs:{value:t.basicInformation.transferNo,placeholder:t.$t("ProcurementVoucherList.transferNo"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.project")}},[r("b-form-input",{attrs:{value:t.basicInformation.project,placeholder:t.$t("ProcurementVoucherList.project"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.procurementStaff")}},[r("b-form-input",{attrs:{value:t.basicInformation.procurementStaff,placeholder:t.$t("ProcurementVoucherList.procurementStaff"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.procurementDepartment")}},[r("b-form-input",{attrs:{value:t.basicInformation.procurementDepartment,placeholder:t.$t("ProcurementVoucherList.procurementDepartment"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.invoice")}},[r("b-form-input",{attrs:{value:t.basicInformation.invoice,placeholder:t.$t("ProcurementVoucherList.invoice"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.taxDeductionCategory")}},[r("b-form-input",{attrs:{value:t.basicInformation.taxDeductionCategory,placeholder:t.$t("ProcurementVoucherList.taxDeductionCategory"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.accountSettingMethod")}},[r("b-form-input",{attrs:{value:t.basicInformation.accountSettingMethod,placeholder:t.$t("ProcurementVoucherList.accountSettingMethod"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.preDeliveryDate")}},[r("b-form-input",{attrs:{value:t.basicInformation.preDeliveryDate,placeholder:t.$t("ProcurementVoucherList.preDeliveryDate"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.deposit")}},[r("b-form-input",{attrs:{value:t.basicInformation.deposit,placeholder:t.$t("ProcurementVoucherList.deposit"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.discount")}},[r("b-form-input",{attrs:{value:t.basicInformation.discount,placeholder:t.$t("ProcurementVoucherList.discount"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.untaxedAmount")}},[r("b-form-input",{attrs:{value:t.basicInformation.untaxedAmount,placeholder:t.$t("ProcurementVoucherList.untaxedAmount"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.tax")}},[r("b-form-input",{attrs:{value:t.basicInformation.tax,placeholder:t.$t("ProcurementVoucherList.tax"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.total")}},[r("b-form-input",{attrs:{value:t.basicInformation.total,placeholder:t.$t("ProcurementVoucherList.total"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.totalLocalCurrency")}},[r("b-form-input",{attrs:{value:t.basicInformation.totalLocalCurrency,placeholder:t.$t("ProcurementVoucherList.totalLocalCurrency"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.status")}},[r("b-form-input",{attrs:{value:t.basicInformation.status,placeholder:t.$t("ProcurementVoucherList.status"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("ProcurementVoucherList.approvalStatus")}},[r("b-form-input",{attrs:{value:t.basicInformation.approvalStatus,placeholder:t.$t("ProcurementVoucherList.approvalStatus"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("action")}},[r("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"primary"}},[t._v(" "+t._s(t.$t("ProcurementVoucherList.submitBtn"))+" ")]),"audited"==t.basicInformation.approvalStatus?r("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"danger"}},[t._v(" "+t._s(t.$t("invalid"))+" ")]):t._e(),"draft"==t.basicInformation.status&&"void"!=t.basicInformation.approvalStatus?r("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"secondary"}},[t._v(" "+t._s(t.$t("ProcurementVoucherList.void"))+" ")]):t._e()],1)],1)],1)],1)},l=[],u=r("1947"),b=r("11de"),d=r("8226"),f=r("4797"),p=r("a15b"),h=r("b28b"),m=r("205f"),v=r("e009"),y={components:{BButton:u["a"],BForm:b["a"],BFormGroup:d["a"],BFormInput:f["a"],BRow:p["a"],BCol:h["a"],BCard:m["a"]},directives:{Ripple:v["a"]},props:{basicInformation:{type:Object,default:function(){}}},mounted:function(){this.$route.query.id&&(this.id=this.$route.query.id)}},g=y,O=r("2877"),j=Object(O["a"])(g,c,l,!1,null,null,null),x=j.exports,w=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-form",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.created_by,placeholder:t.$t("created_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.created_at,placeholder:t.$t("created_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.updated_by,placeholder:t.$t("updated_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.updated_at,placeholder:t.$t("updated_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("remark")}},[r("b-form-textarea",{attrs:{placeholder:t.$t("remark"),rows:"3",value:t.otherRemark.remark,readonly:""}})],1)],1)],1)],1)],1)},$=[],T=r("9c7d"),P={components:{BButton:u["a"],BForm:b["a"],BFormGroup:d["a"],BFormInput:f["a"],BRow:p["a"],BCol:h["a"],BCard:m["a"],BFormTextarea:T["a"]},props:{otherRemark:{type:Object,default:function(){}}}},k=P,_=Object(O["a"])(k,w,$,!1,null,null,null),C=_.exports,L=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("b-row",[r("b-col",{attrs:{cols:"12"}},[r("b-card-code",{attrs:{title:t.$t("ProcurementVoucherModal.productInformation")}},[r("div",{staticClass:"custom-search d-flex justify-content-end"},[r("b-form-group",[r("div",{staticClass:"d-flex align-items-center"},[r("b-form-input",{staticClass:"d-inline-block",attrs:{placeholder:t.$t("table.Search"),type:"text"},model:{value:t.productList.searchTerm,callback:function(e){t.$set(t.productList,"searchTerm",e)},expression:"productList.searchTerm"}})],1)])],1),r("vue-good-table",{attrs:{columns:t.productList.columns,rows:t.productList.rows,"search-options":{enabled:!0,externalQuery:t.productList.searchTerm},"pagination-options":{enabled:!0,perPage:t.productList.pageLength}},scopedSlots:t._u([{key:"loadingContent",fn:function(){return[r("div",{staticClass:"text-center"},[r("b-spinner",{attrs:{variant:"primary",label:"Text Centered"}})],1)]},proxy:!0},{key:"table-column",fn:function(e){return["#"!==e.column.label?r("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("ProcurementVoucherList.ProductList."+e.column.label))+" ")]):t._e()]}},{key:"table-row",fn:function(e){return["id"===e.column.field?r("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.row.originalIndex+1)+" ")]):"remark"===e.column.field?r("span",{staticClass:"text-nowrap"},[r("span",[r("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-primary",size:"sm"},on:{click:function(r){return t.showRemark(t.productList.rows[e.row.originalIndex].remark)}}},[r("feather-icon",{attrs:{icon:"EyeIcon"}}),r("span",[t._v(t._s(t.$t("detail")))])],1)],1)]):r("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.formattedRow[e.column.field])+" ")])]}},{key:"pagination-bottom",fn:function(e){return[r("div",{staticClass:"d-flex justify-content-between flex-wrap"},[r("div",{staticClass:"d-flex align-items-center mb-0 mt-1"},[r("span",{staticClass:"text-nowrap "},[t._v(" "+t._s(t.$t("table.Showing"))+" 1 "+t._s(t.$t("table.to"))+" ")]),r("b-form-select",{staticClass:"mx-1",attrs:{options:["5","10"]},on:{input:function(t){return e.perPageChanged({currentPerPage:t})}},model:{value:t.productList.pageLength,callback:function(e){t.$set(t.productList,"pageLength",e)},expression:"productList.pageLength"}}),r("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("table.of"))+" "+t._s(e.total)+" "+t._s(t.$t("table.entries"))+" ")])],1),r("div",[r("b-pagination",{staticClass:"mt-1 mb-0",attrs:{value:1,"total-rows":e.total,"per-page":t.productList.pageLength,"first-number":"","last-number":"",align:"right","prev-class":"prev-item","next-class":"next-item"},on:{input:function(t){return e.pageChanged({currentPage:t})}},scopedSlots:t._u([{key:"prev-text",fn:function(){return[r("feather-icon",{attrs:{icon:"ChevronLeftIcon",size:"18"}})]},proxy:!0},{key:"next-text",fn:function(){return[r("feather-icon",{attrs:{icon:"ChevronRightIcon",size:"18"}})]},proxy:!0}],null,!0)})],1)])]}}])})],1)],1)],1),r("b-modal",{ref:"remarkDetail",attrs:{title:t.$t("remark"),"ok-only":"","ok-title":t.$t("back"),"ok-variant":"secondary",scrollable:""}},[r("b-card-text",[t._v(" "+t._s(t.remarkDetail)+" ")])],1)],1)},I=[],B=r("541c"),V=r("e98b"),S=r("26d2"),D=r("8361"),R=r("01e3"),z=r("f617"),N=r("10f6"),A={components:{BCardCode:B["a"],BRow:p["a"],BCol:h["a"],BBadge:V["a"],VueGoodTable:z["a"],BPagination:S["a"],BFormGroup:d["a"],BForm:b["a"],BFormInput:f["a"],BFormSelect:D["a"],BButton:u["a"],BSpinner:R["a"]},directives:{Ripple:v["a"],"height-fade":N["a"]},props:{productList:{type:Object,default:function(){}}},computed:{statusVariant:function(){var t={audited:"light-success",draft:"light-primary",underReview:"light-warning",void:"light-danger",caseClosed:"light-success",openCase:"light-warning",invalid:"light-secondary"};return function(e){return t[e]}}},data:function(){return{remarkDetail:""}},methods:{showRemark:function(t){this.remarkDetail=t,this.$refs["remarkDetail"].show()}}},F=A,E=Object(O["a"])(F,L,I,!1,null,null,null),M=E.exports,H={components:{BTabs:o["a"],BTab:s["a"],BasicInformation:x,OtherRemark:C,ProductList:M},data:function(){return{data:{},productListData:{pageLength:5,searchTerm:"",columns:[{label:"#",field:"id",type:"number"},{label:"productNo",field:"code"},{label:"productName",field:"name"},{label:"specification",field:"specification"},{label:"unit",field:"unit"},{label:"storehouse",field:"storehouse"},{label:"quantity",field:"quantity",type:"number"},{label:"unitPrice",field:"unitPrice",type:"number"},{label:"amount",field:"amount",type:"number"},{label:"numberOfTransfers",field:"numberOfTransfers",type:"number"},{label:"untransferredQuantity",field:"untransferredQuantity",type:"number"},{label:"productPreDeliveryDate",field:"preDeliveryDate"},{label:"productRemark",field:"remark"}],rows:[]}}},mounted:function(){var t=this;this.$route.query.id&&i["a"].get("procurementVoucher/".concat(this.$route.query.id)).then((function(e){var r=e.data;t.data=r,t.productListData.rows=JSON.parse(JSON.stringify(r.products))})).catch((function(t){return console.error(t)}))}},q=H,K=(r("ad31"),Object(O["a"])(q,a,n,!1,null,null,null));e["default"]=K.exports},"9c7d":function(t,e,r){"use strict";r.d(e,"a",(function(){return z}));var a=r("2b0e"),n=r("c637"),i=r("a723"),o=r("906c"),s=r("7b1e"),c=r("a8c8"),l=r("3a58"),u=r("d82f"),b=r("cf75"),d=r("dde7"),f=r("06d9"),p=r("ad47"),h=r("d520"),m=r("40fc"),v=r("1f1e"),y=r("90ef"),g=r("602d"),O=r("bc9a"),j=r("992e"),x=r("3c21");function w(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function $(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}function T(t,e,r){return e&&$(t.prototype,e),r&&$(t,r),t}var P="__bv__visibility_observer",k=function(){function t(e,r,a){w(this,t),this.el=e,this.callback=r.callback,this.margin=r.margin||0,this.once=r.once||!1,this.observer=null,this.visible=void 0,this.doneOnce=!1,this.createObserver(a)}return T(t,[{key:"createObserver",value:function(t){var e=this;if(this.observer&&this.stop(),!this.doneOnce&&Object(s["f"])(this.callback)){try{this.observer=new IntersectionObserver(this.handler.bind(this),{root:null,rootMargin:this.margin,threshold:0})}catch(r){return this.doneOnce=!0,this.observer=void 0,void this.callback(null)}t.context.$nextTick((function(){Object(o["z"])((function(){e.observer&&e.observer.observe(e.el)}))}))}}},{key:"handler",value:function(t){var e=t?t[0]:{},r=Boolean(e.isIntersecting||e.intersectionRatio>0);r!==this.visible&&(this.visible=r,this.callback(r),this.once&&this.visible&&(this.doneOnce=!0,this.stop()))}},{key:"stop",value:function(){this.observer&&this.observer.disconnect(),this.observer=null}}]),t}(),_=function(t){var e=t[P];e&&e.stop&&e.stop(),delete t[P]},C=function(t,e,r){var a=e.value,n=e.modifiers,i={margin:"0px",once:!1,callback:a};Object(u["h"])(n).forEach((function(t){j["d"].test(t)?i.margin="".concat(t,"px"):"once"===t.toLowerCase()&&(i.once=!0)})),_(t),t[P]=new k(t,i,r),t[P]._prevModifiers=Object(u["b"])(n)},L=function(t,e,r){var a=e.value,n=e.oldValue,i=e.modifiers;i=Object(u["b"])(i),!t||a===n&&t[P]&&Object(x["a"])(i,t[P]._prevModifiers)||C(t,{value:a,modifiers:i},r)},I=function(t){_(t)},B={bind:C,componentUpdated:L,unbind:I};function V(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function S(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?V(Object(r),!0).forEach((function(e){D(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):V(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function D(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var R=Object(b["d"])(Object(u["m"])(S(S(S(S(S(S({},y["b"]),d["b"]),p["b"]),h["b"]),m["b"]),{},{maxRows:Object(b["c"])(i["o"]),noAutoShrink:Object(b["c"])(i["g"],!1),noResize:Object(b["c"])(i["g"],!1),rows:Object(b["c"])(i["o"],2),wrap:Object(b["c"])(i["r"],"soft")})),n["M"]),z=a["default"].extend({name:n["M"],directives:{"b-visible":B},mixins:[O["a"],y["a"],g["a"],d["a"],p["a"],h["a"],m["a"],f["a"],v["a"]],props:R,data:function(){return{heightInPx:null}},computed:{computedStyle:function(){var t={resize:!this.computedRows||this.noResize?"none":null};return this.computedRows||(t.height=this.heightInPx,t.overflowY="scroll"),t},computedMinRows:function(){return Object(c["c"])(Object(l["b"])(this.rows,2),2)},computedMaxRows:function(){return Object(c["c"])(this.computedMinRows,Object(l["b"])(this.maxRows,0))},computedRows:function(){return this.computedMinRows===this.computedMaxRows?this.computedMinRows:null},computedAttrs:function(){var t=this.disabled,e=this.required;return{id:this.safeId(),name:this.name||null,form:this.form||null,disabled:t,placeholder:this.placeholder||null,required:e,autocomplete:this.autocomplete||null,readonly:this.readonly||this.plaintext,rows:this.computedRows,wrap:this.wrap||null,"aria-required":this.required?"true":null,"aria-invalid":this.computedAriaInvalid}},computedListeners:function(){return S(S({},this.bvListeners),{},{input:this.onInput,change:this.onChange,blur:this.onBlur})}},watch:{localValue:function(){this.setHeight()}},mounted:function(){this.setHeight()},methods:{visibleCallback:function(t){t&&this.$nextTick(this.setHeight)},setHeight:function(){var t=this;this.$nextTick((function(){Object(o["z"])((function(){t.heightInPx=t.computeHeight()}))}))},computeHeight:function(){if(this.$isServer||!Object(s["g"])(this.computedRows))return null;var t=this.$el;if(!Object(o["s"])(t))return null;var e=Object(o["k"])(t),r=Object(l["a"])(e.lineHeight,1),a=Object(l["a"])(e.borderTopWidth,0)+Object(l["a"])(e.borderBottomWidth,0),n=Object(l["a"])(e.paddingTop,0)+Object(l["a"])(e.paddingBottom,0),i=a+n,u=r*this.computedMinRows+i,b=Object(o["l"])(t,"height")||e.height;Object(o["D"])(t,"height","auto");var d=t.scrollHeight;Object(o["D"])(t,"height",b);var f=Object(c["c"])((d-n)/r,2),p=Object(c["d"])(Object(c["c"])(f,this.computedMinRows),this.computedMaxRows),h=Object(c["c"])(Object(c["a"])(p*r+i),u);return this.noAutoShrink&&Object(l["a"])(b,0)>h?b:"".concat(h,"px")}},render:function(t){return t("textarea",{class:this.computedClass,style:this.computedStyle,directives:[{name:"b-visible",value:this.visibleCallback,modifiers:{640:!0}}],attrs:this.computedAttrs,domProps:{value:this.localValue},on:this.computedListeners,ref:"input"})}})},ad31:function(t,e,r){"use strict";r("30f3")},e98b:function(t,e,r){"use strict";r.d(e,"a",(function(){return m}));var a=r("2b0e"),n=r("b42e"),i=r("c637"),o=r("a723"),s=r("d82f"),c=r("cf75"),l=r("4a38"),u=r("aa59");function b(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?b(Object(r),!0).forEach((function(e){f(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):b(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function f(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var p=Object(s["j"])(u["b"],["event","routerTag"]);delete p.href.default,delete p.to.default;var h=Object(c["d"])(Object(s["m"])(d(d({},p),{},{pill:Object(c["c"])(o["g"],!1),tag:Object(c["c"])(o["r"],"span"),variant:Object(c["c"])(o["r"],"secondary")})),i["c"]),m=a["default"].extend({name:i["c"],functional:!0,props:h,render:function(t,e){var r=e.props,a=e.data,i=e.children,o=r.active,s=r.disabled,b=Object(l["d"])(r),d=b?u["a"]:r.tag,f=r.variant||"secondary";return t(d,Object(n["a"])(a,{staticClass:"badge",class:["badge-".concat(f),{"badge-pill":r.pill,active:o,disabled:s}],props:b?Object(c["e"])(p,r):{}}),i)}})},f902:function(t,e,r){"use strict";r.d(e,"a",(function(){return M}));var a,n=r("2b0e"),i=r("2f79"),o=r("c637"),s=r("e863"),c=r("0056"),l=r("9bfa"),u=r("a723"),b=r("9b76"),d=r("2326"),f=r("6d40"),p=r("906c"),h=r("6b77"),m=r("6c06"),v=r("7b1e"),y=r("3c21"),g=r("a8c8"),O=r("58f2"),j=r("3a58"),x=r("d82f"),w=r("47df"),$=r("cf75"),T=function(t,e){return t.map((function(t,e){return[e,t]})).sort(function(t,e){return this(t[1],e[1])||t[0]-e[0]}.bind(e)).map((function(t){return t[1]}))},P=r("90ef"),k=r("8c18"),_=r("aa59"),C=r("59fb");function L(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function I(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?L(Object(r),!0).forEach((function(e){B(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):L(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function B(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var V=Object(O["a"])("value",{type:u["m"]}),S=V.mixin,D=V.props,R=V.prop,z=V.event,N=function(t){return!t.disabled},A=n["default"].extend({name:o["qb"],inject:{bvTabs:{default:function(){return{}}}},props:{controls:Object($["c"])(u["r"]),id:Object($["c"])(u["r"]),noKeyNav:Object($["c"])(u["g"],!1),posInSet:Object($["c"])(u["m"]),setSize:Object($["c"])(u["m"]),tab:Object($["c"])(),tabIndex:Object($["c"])(u["m"])},methods:{focus:function(){Object(p["d"])(this.$refs.link)},handleEvt:function(t){if(!this.tab.disabled){var e=t.type,r=t.keyCode,a=t.shiftKey;"click"===e||"keydown"===e&&r===l["j"]?(Object(h["f"])(t),this.$emit(c["f"],t)):"keydown"!==e||this.noKeyNav||(-1!==[l["k"],l["f"],l["e"]].indexOf(r)?(Object(h["f"])(t),a||r===l["e"]?this.$emit(c["o"],t):this.$emit(c["C"],t)):-1!==[l["a"],l["i"],l["b"]].indexOf(r)&&(Object(h["f"])(t),a||r===l["b"]?this.$emit(c["v"],t):this.$emit(c["y"],t)))}}},render:function(t){var e=this.id,r=this.tabIndex,a=this.setSize,n=this.posInSet,i=this.controls,o=this.handleEvt,s=this.tab,c=s.title,l=s.localActive,u=s.disabled,d=s.titleItemClass,f=s.titleLinkClass,p=s.titleLinkAttributes,h=t(_["a"],{staticClass:"nav-link",class:[{active:l&&!u,disabled:u},f,l?this.bvTabs.activeNavItemClass:null],props:{disabled:u},attrs:I(I({},p),{},{id:e,role:"tab",tabindex:r,"aria-selected":l&&!u?"true":"false","aria-setsize":a,"aria-posinset":n,"aria-controls":i}),on:{click:o,keydown:o},ref:"link"},[this.tab.normalizeSlot(b["K"])||c]);return t("li",{staticClass:"nav-item",class:[d],attrs:{role:"presentation"}},[h])}}),F=Object(x["j"])(C["b"],["tabs","isNavBar","cardHeader"]),E=Object($["d"])(Object(x["m"])(I(I(I(I({},P["b"]),D),F),{},{activeNavItemClass:Object($["c"])(u["e"]),activeTabClass:Object($["c"])(u["e"]),card:Object($["c"])(u["g"],!1),contentClass:Object($["c"])(u["e"]),end:Object($["c"])(u["g"],!1),lazy:Object($["c"])(u["g"],!1),navClass:Object($["c"])(u["e"]),navWrapperClass:Object($["c"])(u["e"]),noFade:Object($["c"])(u["g"],!1),noKeyNav:Object($["c"])(u["g"],!1),noNavStyle:Object($["c"])(u["g"],!1),tag:Object($["c"])(u["r"],"div")})),o["pb"]),M=n["default"].extend({name:o["pb"],mixins:[P["a"],S,k["a"]],provide:function(){return{bvTabs:this}},props:E,data:function(){return{currentTab:Object(j["b"])(this[R],-1),tabs:[],registeredTabs:[]}},computed:{fade:function(){return!this.noFade},localNavClass:function(){var t=[];return this.card&&this.vertical&&t.push("card-header","h-100","border-bottom-0","rounded-0"),[].concat(t,[this.navClass])}},watch:(a={},B(a,R,(function(t,e){if(t!==e){t=Object(j["b"])(t,-1),e=Object(j["b"])(e,0);var r=this.tabs[t];r&&!r.disabled?this.activateTab(r):t<e?this.previousTab():this.nextTab()}})),B(a,"currentTab",(function(t){var e=-1;this.tabs.forEach((function(r,a){a!==t||r.disabled?r.localActive=!1:(r.localActive=!0,e=a)})),this.$emit(z,e)})),B(a,"tabs",(function(t,e){var r=this;Object(y["a"])(t.map((function(t){return t[i["a"]]})),e.map((function(t){return t[i["a"]]})))||this.$nextTick((function(){r.$emit(c["e"],t.slice(),e.slice())}))})),B(a,"registeredTabs",(function(){this.updateTabs()})),a),created:function(){this.$_observer=null},mounted:function(){this.setObserver(!0)},beforeDestroy:function(){this.setObserver(!1),this.tabs=[]},methods:{registerTab:function(t){Object(d["a"])(this.registeredTabs,t)||this.registeredTabs.push(t)},unregisterTab:function(t){this.registeredTabs=this.registeredTabs.slice().filter((function(e){return e!==t}))},setObserver:function(){var t=this,e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];if(this.$_observer&&this.$_observer.disconnect(),this.$_observer=null,e){var r=function(){t.$nextTick((function(){Object(p["z"])((function(){t.updateTabs()}))}))};this.$_observer=Object(w["a"])(this.$refs.content,r,{childList:!0,subtree:!1,attributes:!0,attributeFilter:["id"]})}},getTabs:function(){var t=this.registeredTabs.filter((function(t){return 0===t.$children.filter((function(t){return t._isTab})).length})),e=[];if(s["f"]&&t.length>0){var r=t.map((function(t){return"#".concat(t.safeId())})).join(", ");e=Object(p["B"])(r,this.$el).map((function(t){return t.id})).filter(m["a"])}return T(t,(function(t,r){return e.indexOf(t.safeId())-e.indexOf(r.safeId())}))},updateTabs:function(){var t=this.getTabs(),e=t.indexOf(t.slice().reverse().find((function(t){return t.localActive&&!t.disabled})));if(e<0){var r=this.currentTab;r>=t.length?e=t.indexOf(t.slice().reverse().find(N)):t[r]&&!t[r].disabled&&(e=r)}e<0&&(e=t.indexOf(t.find(N))),t.forEach((function(t,r){t.localActive=r===e})),this.tabs=t,this.currentTab=e},getButtonForTab:function(t){return(this.$refs.buttons||[]).find((function(e){return e.tab===t}))},updateButton:function(t){var e=this.getButtonForTab(t);e&&e.$forceUpdate&&e.$forceUpdate()},activateTab:function(t){var e=this.currentTab,r=this.tabs,a=!1;if(t){var n=r.indexOf(t);if(n!==e&&n>-1&&!t.disabled){var i=new f["a"](c["a"],{cancelable:!0,vueTarget:this,componentId:this.safeId()});this.$emit(i.type,n,e,i),i.defaultPrevented||(this.currentTab=n,a=!0)}}return a||this[R]===e||this.$emit(z,e),a},deactivateTab:function(t){return!!t&&this.activateTab(this.tabs.filter((function(e){return e!==t})).find(N))},focusButton:function(t){var e=this;this.$nextTick((function(){Object(p["d"])(e.getButtonForTab(t))}))},emitTabClick:function(t,e){Object(v["d"])(e)&&t&&t.$emit&&!t.disabled&&t.$emit(c["f"],e)},clickTab:function(t,e){this.activateTab(t),this.emitTabClick(t,e)},firstTab:function(t){var e=this.tabs.find(N);this.activateTab(e)&&t&&(this.focusButton(e),this.emitTabClick(e,t))},previousTab:function(t){var e=Object(g["c"])(this.currentTab,0),r=this.tabs.slice(0,e).reverse().find(N);this.activateTab(r)&&t&&(this.focusButton(r),this.emitTabClick(r,t))},nextTab:function(t){var e=Object(g["c"])(this.currentTab,-1),r=this.tabs.slice(e+1).find(N);this.activateTab(r)&&t&&(this.focusButton(r),this.emitTabClick(r,t))},lastTab:function(t){var e=this.tabs.slice().reverse().find(N);this.activateTab(e)&&t&&(this.focusButton(e),this.emitTabClick(e,t))}},render:function(t){var e=this,r=this.align,a=this.card,n=this.end,o=this.fill,s=this.firstTab,l=this.justified,u=this.lastTab,d=this.nextTab,f=this.noKeyNav,p=this.noNavStyle,h=this.pills,m=this.previousTab,v=this.small,y=this.tabs,g=this.vertical,O=y.find((function(t){return t.localActive&&!t.disabled})),j=y.find((function(t){return!t.disabled})),x=y.map((function(r,a){var n,o=r.safeId,l=null;return f||(l=-1,(r===O||!O&&r===j)&&(l=null)),t(A,{props:{controls:o?o():null,id:r.controlledBy||(o?o("_BV_tab_button_"):null),noKeyNav:f,posInSet:a+1,setSize:y.length,tab:r,tabIndex:l},on:(n={},B(n,c["f"],(function(t){e.clickTab(r,t)})),B(n,c["o"],s),B(n,c["C"],m),B(n,c["y"],d),B(n,c["v"],u),n),key:r[i["a"]]||a,ref:"buttons",refInFor:!0})})),w=t(C["a"],{class:this.localNavClass,attrs:{role:"tablist",id:this.safeId("_BV_tab_controls_")},props:{fill:o,justified:l,align:r,tabs:!p&&!h,pills:!p&&h,vertical:g,small:v,cardHeader:a&&!g},ref:"nav"},[this.normalizeSlot(b["I"])||t(),x,this.normalizeSlot(b["H"])||t()]);w=t("div",{class:[{"card-header":a&&!g&&!n,"card-footer":a&&!g&&n,"col-auto":g},this.navWrapperClass],key:"bv-tabs-nav"},[w]);var $=this.normalizeSlot()||[],T=t();0===$.length&&(T=t("div",{class:["tab-pane","active",{"card-body":a}],key:"bv-empty-tab"},this.normalizeSlot(b["k"])));var P=t("div",{staticClass:"tab-content",class:[{col:g},this.contentClass],attrs:{id:this.safeId("_BV_tab_container_")},key:"bv-content",ref:"content"},[$,T]);return t(this.tag,{staticClass:"tabs",class:{row:g,"no-gutters":g&&a},attrs:{id:this.safeId()}},[n?P:t(),w,n?t():P])}})}}]);
//# sourceMappingURL=chunk-7c1b2674.48aebe75.js.map