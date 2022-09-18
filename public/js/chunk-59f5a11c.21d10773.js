(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-59f5a11c"],{"262d":function(e,t,a){"use strict";a("50d9")},"50d9":function(e,t,a){},"71bd":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("b-row",[a("b-col",{attrs:{cols:"12"}},[a("b-card-code",{attrs:{title:e.$t("Procurement Voucher")}},[a("div",{staticClass:"custom-search d-flex justify-content-end"},[a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mb-2 mr-2",attrs:{variant:"outline-primary",to:{name:"ProcurementOperation-ProcurementVoucherCreate"}}},[e._v(" "+e._s(e.$t("create"))+" ")]),a("b-form-group",[a("div",{staticClass:"d-flex align-items-center"},[a("b-form-input",{staticClass:"d-inline-block",attrs:{placeholder:e.$t("table.Search"),type:"text"},model:{value:e.serverParams.searchTerm,callback:function(t){e.$set(e.serverParams,"searchTerm",t)},expression:"serverParams.searchTerm"}})],1)])],1),a("vue-good-table",{attrs:{mode:"remote",totalRows:e.totalRecords,isLoading:e.isLoading,"pagination-options":{enabled:!0},"search-options":{enabled:!0,externalQuery:e.serverParams.searchTerm},"sort-options":{enabled:!0},rows:e.rows,columns:e.columns},on:{"on-page-change":e.onPageChange,"on-sort-change":e.onSortChange,"on-per-page-change":e.onPerPageChange,"update:isLoading":function(t){e.isLoading=t},"update:is-loading":function(t){e.isLoading=t},"on-search":e.onSearch},scopedSlots:e._u([{key:"loadingContent",fn:function(){return[a("div",{staticClass:"text-center"},[a("b-spinner",{attrs:{variant:"primary",label:"Text Centered"}})],1)]},proxy:!0},{key:"table-column",fn:function(t){return["#"!==t.column.label?a("span",{staticClass:"text-nowrap"},[e._v(" "+e._s(e.$t("ProcurementVoucherList."+t.column.label))+" ")]):e._e()]}},{key:"table-row",fn:function(t){return["id"===t.column.field?a("span",{staticClass:"text-nowrap"},[e._v(" "+e._s(t.row.originalIndex+1)+" ")]):"approvalStatus"===t.column.field?a("span",{staticClass:"text-nowrap"},[a("b-badge",{attrs:{variant:e.statusVariant(t.row.approvalStatus)}},[e._v(" "+e._s(e.$t("ProcurementVoucherList."+t.row.approvalStatus))+" ")])],1):"status"===t.column.field?a("span",{staticClass:"text-nowrap"},[a("b-badge",{attrs:{variant:e.statusVariant(t.row.status)}},[e._v(" "+e._s(e.$t("ProcurementVoucherList."+t.row.status))+" ")])],1):"action"===t.column.field?a("span",{staticClass:"text-nowrap"},[a("span",[a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],staticClass:"mr-1",attrs:{variant:"outline-primary",size:"sm",to:{name:"ProcurementOperation-ProcurementVoucherDetail",query:{id:t.row.id}}}},[a("feather-icon",{attrs:{icon:"FilePlusIcon"}}),a("span",[e._v(e._s(e.$t("detail")))])],1),"underReview"==t.row.approvalStatus?a("b-button",{directives:[{name:"ripple",rawName:"v-ripple.400",value:"rgba(255, 255, 255, 0.15)",expression:"'rgba(255, 255, 255, 0.15)'",modifiers:{400:!0}}],attrs:{variant:"outline-success",size:"sm",to:{name:"ProcurementOperation-ProcurementVoucherEdit",query:{id:t.row.id}}}},[a("feather-icon",{attrs:{icon:"Edit2Icon"}}),a("span",[e._v(e._s(e.$t("edit")))])],1):e._e()],1)]):a("span",{staticClass:"text-nowrap"},[e._v(" "+e._s(t.formattedRow[t.column.field])+" ")])]}},{key:"pagination-bottom",fn:function(t){return[a("div",{staticClass:"d-flex justify-content-between flex-wrap"},[a("div",{staticClass:"d-flex align-items-center mb-0 mt-1"},[a("span",{staticClass:"text-nowrap "},[e._v(" "+e._s(e.$t("table.Showing"))+" 1 "+e._s(e.$t("table.to"))+" ")]),a("b-form-select",{staticClass:"mx-1",attrs:{options:["5","10"]},on:{input:function(e){return t.perPageChanged({currentPerPage:e})}},model:{value:e.serverParams.perPage,callback:function(t){e.$set(e.serverParams,"perPage",t)},expression:"serverParams.perPage"}}),a("span",{staticClass:"text-nowrap"},[e._v(" "+e._s(e.$t("table.of"))+" "+e._s(t.total)+" "+e._s(e.$t("table.entries"))+" ")])],1),a("div",[a("b-pagination",{staticClass:"mt-1 mb-0",attrs:{value:1,"total-rows":t.total,"per-page":e.serverParams.perPage,"first-number":"","last-number":"",align:"right","prev-class":"prev-item","next-class":"next-item"},on:{input:function(e){return t.pageChanged({currentPage:e})}},scopedSlots:e._u([{key:"prev-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronLeftIcon",size:"18"}})]},proxy:!0},{key:"next-text",fn:function(){return[a("feather-icon",{attrs:{icon:"ChevronRightIcon",size:"18"}})]},proxy:!0}],null,!0)})],1)])]}}])})],1)],1)],1)},n=[],s=a("541c"),o=a("a15b"),i=a("b28b"),c=a("e98b"),u=a("26d2"),l=a("8226"),p=a("4797"),d=a("8361"),m=a("1947"),f=a("01e3"),b=a("f617"),v=a("e009"),g=a("7f80"),h={components:{BCardCode:s["a"],BRow:o["a"],BCol:i["a"],VueGoodTable:b["a"],BBadge:c["a"],BPagination:u["a"],BFormGroup:l["a"],BFormInput:p["a"],BFormSelect:d["a"],BButton:m["a"],BSpinner:f["a"]},directives:{Ripple:v["a"]},data:function(){return{apiPath:"/procurementVoucher",columns:[{label:"#",field:"id"},{label:"procurementDate",field:"procurementDate"},{label:"procurementNo",field:"procurementNo"},{label:"manufacturer",field:"manufacturer"},{label:"procurementStaff",field:"procurementStaff"},{label:"preDeliveryDate",field:"preDeliveryDate"},{label:"project",field:"project"},{label:"status",field:"status"},{label:"approvalStatus",field:"approvalStatus"},{label:"action",field:"action"}],rows:[{id:1,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"openCase",approvalStatus:"void"},{id:2,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"openCase",approvalStatus:"underReview"},{id:3,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"invalid",approvalStatus:"audited"},{id:4,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"caseClosed",approvalStatus:"audited"},{id:5,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"caseClosed",approvalStatus:"audited"},{id:6,procurementDate:"2022/06/22",procurementNo:"20220622001",manufacturer:"廠商A",procurementStaff:"dennis",preDeliveryDate:"2022/06/30",project:"ABC123",status:"invalid",approvalStatus:"audited"}],isLoading:!1,totalRecords:0,serverParams:{sort:[{field:"",type:""}],page:1,perPage:10,searchTerm:""}}},computed:{statusVariant:function(){var e={audited:"light-success",underReview:"light-warning",void:"light-danger",caseClosed:"light-success",openCase:"light-warning",invalid:"light-secondary"};return function(t){return e[t]}}},methods:{onSearch:function(e){var t=e.searchTerm;this.serverParams.searchTerm=t,this.getList()},updateParams:function(e){this.serverParams=Object.assign({},this.serverParams,e)},onPageChange:function(e){this.updateParams({page:e.currentPage}),this.getList()},onPerPageChange:function(e){this.updateParams({perPage:e.currentPerPage}),this.getList()},onSortChange:function(e){this.updateParams({sort:e}),this.getList()},getList:function(){var e=this;g["a"].post("".concat(this.apiPath,"/list"),this.serverParams).then((function(t){var a=t.data,r=a.data,n=a.meta;e.rows=r,e.totalRecords=n.total})).catch((function(e){return console.error(e)}))}},created:function(){this.getList()}},P=h,w=(a("262d"),a("2877")),C=Object(w["a"])(P,r,n,!1,null,null,null);t["default"]=C.exports},e98b:function(e,t,a){"use strict";a.d(t,"a",(function(){return v}));var r=a("2b0e"),n=a("b42e"),s=a("c637"),o=a("a723"),i=a("d82f"),c=a("cf75"),u=a("4a38"),l=a("aa59");function p(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,r)}return a}function d(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?p(Object(a),!0).forEach((function(t){m(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):p(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function m(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}var f=Object(i["j"])(l["b"],["event","routerTag"]);delete f.href.default,delete f.to.default;var b=Object(c["d"])(Object(i["m"])(d(d({},f),{},{pill:Object(c["c"])(o["g"],!1),tag:Object(c["c"])(o["r"],"span"),variant:Object(c["c"])(o["r"],"secondary")})),s["c"]),v=r["default"].extend({name:s["c"],functional:!0,props:b,render:function(e,t){var a=t.props,r=t.data,s=t.children,o=a.active,i=a.disabled,p=Object(u["d"])(a),d=p?l["a"]:a.tag,m=a.variant||"secondary";return e(d,Object(n["a"])(r,{staticClass:"badge",class:["badge-".concat(m),{"badge-pill":a.pill,active:o,disabled:i}],props:p?Object(c["e"])(f,a):{}}),s)}})}}]);
//# sourceMappingURL=chunk-59f5a11c.21d10773.js.map