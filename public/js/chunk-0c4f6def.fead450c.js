(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-0c4f6def"],{"0360":function(t,e,a){"use strict";a("f5f9")},"4b40":function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("b-row",[a("b-col",{attrs:{cols:"12"}},[a("b-card-code",{attrs:{title:t.$t("Adjustment Voucher")}},[a("div",{staticClass:"custom-search d-flex justify-content-end"},[a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"outline-primary",to:{name:"AdjustTheTransferOperation-AdjustmentVoucherCreate"}}},[t._v(" "+t._s(t.$t("create"))+" ")]),a("b-form-group",[a("div",{staticClass:"d-flex align-items-center"},[a("b-form-input",{staticClass:"d-inline-block",attrs:{placeholder:t.$t("table.Search"),type:"text"},model:{value:t.serverParams.searchTerm,callback:function(e){t.$set(t.serverParams,"searchTerm",e)},expression:"serverParams.searchTerm"}})],1)])],1),a("vue-good-table",{attrs:{mode:"remote",totalRows:t.totalRecords,isLoading:t.isLoading,"pagination-options":{enabled:!0},"search-options":{enabled:!0,externalQuery:t.serverParams.searchTerm},"sort-options":{enabled:!0},rows:t.rows,columns:t.columns},on:{"on-page-change":t.onPageChange,"on-sort-change":t.onSortChange,"on-per-page-change":t.onPerPageChange,"update:isLoading":function(e){t.isLoading=e},"update:is-loading":function(e){t.isLoading=e},"on-search":t.onSearch},scopedSlots:t._u([{key:"loadingContent",fn:function(){return[a("div",{staticClass:"text-center"},[a("b-spinner",{attrs:{variant:"primary",label:"Text Centered"}})],1)]},proxy:!0},{key:"table-column",fn:function(e){return["#"!==e.column.label?a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("AdjustmentVoucherList."+e.column.label))+" ")]):t._e()]}},{key:"table-row",fn:function(e){return["id"===e.column.field?a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.row.originalIndex+1)+" ")]):"approvalStatus"===e.column.field?a("span",{staticClass:"text-nowrap"},[a("b-badge",{attrs:{variant:t.statusVariant(e.row.approvalStatus)}},[t._v(" "+t._s(t.$t("AdjustmentVoucherList."+e.row.approvalStatus))+" ")])],1):"status"===e.column.field?a("span",{staticClass:"text-nowrap"},[a("b-badge",{attrs:{variant:t.statusVariant(e.row.status)}},[t._v(" "+t._s(t.$t("AdjustmentVoucherList."+e.row.status))+" ")])],1):"action"===e.column.field?a("span",{staticClass:"text-nowrap"},[a("span",[a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mr-1",attrs:{variant:"outline-primary",size:"sm",to:{name:"AdjustTheTransferOperation-AdjustmentVoucherDetail",query:{id:e.row.id}}}},[a("feather-icon",{attrs:{icon:"FilePlusIcon"}}),a("span",[t._v(t._s(t.$t("detail")))])],1),"underReview"==e.row.approvalStatus?a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-success",size:"sm",to:{name:"AdjustTheTransferOperation-AdjustmentVoucherEdit",query:{id:e.row.id}}}},[a("feather-icon",{attrs:{icon:"Edit2Icon"}}),a("span",[t._v(t._s(t.$t("edit")))])],1):t._e()],1)]):a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(e.formattedRow[e.column.field])+" ")])]}},{key:"pagination-bottom",fn:function(e){return[a("div",{staticClass:"d-flex justify-content-between flex-wrap"},[a("div",{staticClass:"d-flex align-items-center mb-0 mt-1"},[a("span",{staticClass:"text-nowrap "},[t._v(" "+t._s(t.$t("table.Showing"))+" 1 "+t._s(t.$t("table.to"))+" ")]),a("b-form-select",{staticClass:"mx-1",attrs:{options:["5","10"]},on:{input:function(t){return e.perPageChanged({currentPerPage:t})}},model:{value:t.serverParams.perPage,callback:function(e){t.$set(t.serverParams,"perPage",e)},expression:"serverParams.perPage"}}),a("span",{staticClass:"text-nowrap"},[t._v(" "+t._s(t.$t("table.of"))+" "+t._s(e.total)+" "+t._s(t.$t("table.entries"))+" ")])],1),a("div",[a("b-pagination",{staticClass:"mt-1 mb-0",attrs:{value:1,"total-rows":e.total,"per-page":t.serverParams.perPage,"first-number":"","last-number":"",align:"right","prev-class":"prev-item","next-class":"next-item"},on:{input:function(t){return e.pageChanged({currentPage:t})}},scopedSlots:t._u([{key:"prev-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronLeftIcon",size:"18"}})]},proxy:!0},{key:"next-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronRightIcon",size:"18"}})]},proxy:!0}],null,!0)})],1)])]}}])})],1)],1)],1)},s=[],r=a("541c"),o=a("a15b"),i=a("b28b"),l=a("e98b"),c=a("26d2"),u=a("8226"),d=a("4797"),p=a("8361"),m=a("1947"),f=a("01e3"),g=a("f617"),b=a("e009"),h=a("7f80"),v={components:{BCardCode:r["a"],BRow:o["a"],BCol:i["a"],VueGoodTable:g["a"],BBadge:l["a"],BPagination:c["a"],BFormGroup:u["a"],BFormInput:d["a"],BFormSelect:p["a"],BButton:m["a"],BSpinner:f["a"]},directives:{Ripple:b["a"]},data:function(){return{apiPath:"/adjustmentVoucher",columns:[{label:"#",field:"id"},{label:"adjustmentDate",field:"adjustmentDate"},{label:"adjustmentNo",field:"adjustmentNo"},{label:"adjustmentCategory",field:"adjustmentCategory"},{label:"adjustmentMethod",field:"adjustmentMethod"},{label:"applicants",field:"applicants"},{label:"peopleInCharge",field:"peopleInCharge"},{label:"status",field:"status"},{label:"approvalStatus",field:"approvalStatus"},{label:"action",field:"action"}],rows:[{id:1,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"openCase",approvalStatus:"void"},{id:2,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"openCase",approvalStatus:"underReview"},{id:3,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"invalid",approvalStatus:"audited"},{id:4,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"caseClosed",approvalStatus:"audited"},{id:5,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"caseClosed",approvalStatus:"audited"},{id:6,adjustmentDate:"2022/06/22",adjustmentNo:"20220622001",adjustmentCategory:"分類A",adjustmentMethod:"只調數量",applicants:"dennis",peopleInCharge:"dennis",status:"invalid",approvalStatus:"audited"}],isLoading:!1,totalRecords:0,serverParams:{sort:[{field:"",type:""}],page:1,perPage:10,searchTerm:""}}},computed:{statusVariant:function(){var t={audited:"light-success",underReview:"light-warning",void:"light-danger",caseClosed:"light-success",openCase:"light-warning",invalid:"light-secondary"};return function(e){return t[e]}}},methods:{onSearch:function(t){var e=t.searchTerm;this.serverParams.searchTerm=e,this.getList()},updateParams:function(t){this.serverParams=Object.assign({},this.serverParams,t)},onPageChange:function(t){this.updateParams({page:t.currentPage}),this.getList()},onPerPageChange:function(t){this.updateParams({perPage:t.currentPerPage}),this.getList()},onSortChange:function(t){this.updateParams({sort:t}),this.getList()},getList:function(){var t=this;h["a"].post("".concat(this.apiPath,"/list"),this.serverParams).then((function(e){var a=e.data,n=a.data,s=a.meta;t.rows=n,t.totalRecords=s.total})).catch((function(t){return console.error(t)}))}},created:function(){this.getList()}},j=v,C=(a("0360"),a("2877")),w=Object(C["a"])(j,n,s,!1,null,null,null);e["default"]=w.exports},e98b:function(t,e,a){"use strict";a.d(e,"a",(function(){return b}));var n=a("2b0e"),s=a("b42e"),r=a("c637"),o=a("a723"),i=a("d82f"),l=a("cf75"),c=a("4a38"),u=a("aa59");function d(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,n)}return a}function p(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?d(Object(a),!0).forEach((function(e){m(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):d(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function m(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}var f=Object(i["j"])(u["b"],["event","routerTag"]);delete f.href.default,delete f.to.default;var g=Object(l["d"])(Object(i["m"])(p(p({},f),{},{pill:Object(l["c"])(o["g"],!1),tag:Object(l["c"])(o["r"],"span"),variant:Object(l["c"])(o["r"],"secondary")})),r["c"]),b=n["default"].extend({name:r["c"],functional:!0,props:g,render:function(t,e){var a=e.props,n=e.data,r=e.children,o=a.active,i=a.disabled,d=Object(c["d"])(a),p=d?u["a"]:a.tag,m=a.variant||"secondary";return t(p,Object(s["a"])(n,{staticClass:"badge",class:["badge-".concat(m),{"badge-pill":a.pill,active:o,disabled:i}],props:d?Object(l["e"])(f,a):{}}),r)}})},f5f9:function(t,e,a){}}]);
//# sourceMappingURL=chunk-0c4f6def.fead450c.js.map