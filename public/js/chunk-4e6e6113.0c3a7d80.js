(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4e6e6113"],{a15b:function(t,e,r){"use strict";r.d(e,"a",(function(){return $}));var a=r("b42e"),o=r("c637"),n=r("a723"),c=r("2326"),s=r("228e"),l=r("6c06"),u=r("b508"),b=r("d82f"),i=r("cf75"),p=r("fa73");function f(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?f(Object(r),!0).forEach((function(e){m(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function m(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var h=["start","end","center"],y=Object(u["a"])((function(t,e){return e=Object(p["g"])(Object(p["f"])(e)),e?Object(p["c"])(["row-cols",t,e].filter(l["a"]).join("-")):null})),O=Object(u["a"])((function(t){return Object(p["c"])(t.replace("cols",""))})),j=[],g=function(){var t=Object(s["b"])().reduce((function(t,e){return t[Object(i["g"])(e,"cols")]=Object(i["c"])(n["o"]),t}),Object(b["c"])(null));return j=Object(b["h"])(t),Object(i["d"])(Object(b["m"])(d(d({},t),{},{alignContent:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"between","around","stretch"),t)})),alignH:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"between","around"),t)})),alignV:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"baseline","stretch"),t)})),noGutters:Object(i["c"])(n["g"],!1),tag:Object(i["c"])(n["r"],"div")})),o["kb"])},$={name:o["kb"],functional:!0,get props(){return delete this.props,this.props=g(),this.props},render:function(t,e){var r,o=e.props,n=e.data,c=e.children,s=o.alignV,l=o.alignH,u=o.alignContent,b=[];return j.forEach((function(t){var e=y(O(t),o[t]);e&&b.push(e)})),b.push((r={"no-gutters":o.noGutters},m(r,"align-items-".concat(s),s),m(r,"justify-content-".concat(l),l),m(r,"align-content-".concat(u),u),r)),t(o.tag,Object(a["a"])(n,{staticClass:"row",class:b}),c)}}},d5a7:function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("b-tabs",{attrs:{"content-class":"col-12 mt-1 mt-md-0",pills:"","nav-wrapper-class":"col-12"}},[r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"FileTextIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Basic Information")))])]},proxy:!0}])},[t.data?r("basic-information",{attrs:{"basic-information":t.data}}):t._e()],1),r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"EditIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Other Remark")))])]},proxy:!0}])},[t.data?r("other-remark",{attrs:{"other-remark":t.data}}):t._e()],1)],1)],1)},o=[],n=r("7f80"),c=r("f902"),s=r("6190"),l=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.code")}},[r("b-form-input",{attrs:{value:t.basicInformation.code,placeholder:t.$t("WarehouseList.code"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.name")}},[r("b-form-input",{attrs:{value:t.basicInformation.name,placeholder:t.$t("WarehouseList.name"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.contactPerson")}},[r("b-form-input",{attrs:{value:t.basicInformation.contact_person,placeholder:t.$t("WarehouseList.contactPerson"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.phoneNumber")}},[r("b-form-input",{attrs:{value:t.basicInformation.phone,placeholder:t.$t("WarehouseList.phoneNumber"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.fax")}},[r("b-form-input",{attrs:{value:t.basicInformation.fax,placeholder:t.$t("WarehouseList.fax"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.address")}},[r("b-form-input",{attrs:{value:t.basicInformation.address,placeholder:t.$t("WarehouseList.address"),type:"text",readonly:""}})],1)],1)],1)],1)},u=[],b=r("1947"),i=r("11de"),p=r("8226"),f=r("4797"),d=r("a15b"),m=r("b28b"),h=r("205f"),y={components:{BButton:b["a"],BForm:i["a"],BFormGroup:p["a"],BFormInput:f["a"],BRow:d["a"],BCol:m["a"],BCard:h["a"]},props:{basicInformation:{type:Object,default:function(){}}}},O=y,j=r("2877"),g=Object(j["a"])(O,l,u,!1,null,null,null),$=g.exports,v=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-form",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.creator&&t.otherRemark.creator.name,placeholder:t.$t("created_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.created_at,placeholder:t.$t("created_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.editor&&t.otherRemark.editor.name,placeholder:t.$t("updated_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.updated_at,placeholder:t.$t("updated_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("status")}},[r("b-form-input",{attrs:{value:t.$t(t.otherRemark.status),placeholder:t.$t("status"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("WarehouseList.disable_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.disable_at,placeholder:t.$t("WarehouseList.disable_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("remark")}},[r("b-form-textarea",{attrs:{placeholder:t.$t("remark"),rows:"3",value:t.otherRemark.remark,readonly:""}})],1)],1)],1)],1)],1)},_=[],w=r("9c7d"),k={components:{BButton:b["a"],BForm:i["a"],BFormGroup:p["a"],BFormInput:f["a"],BRow:d["a"],BCol:m["a"],BCard:h["a"],BFormTextarea:w["a"]},props:{otherRemark:{type:Object,default:function(){}}}},x=k,B=Object(j["a"])(x,v,_,!1,null,null,null),L=B.exports,R={components:{BTabs:c["a"],BTab:s["a"],BasicInformation:$,OtherRemark:L},data:function(){return{data:{}}},mounted:function(){var t=this;this.$route.query.id&&n["a"].get("storehouses/".concat(this.$route.query.id)).then((function(e){t.data=e.data})).catch((function(t){return console.error(t)}))}},W=R,I=Object(j["a"])(W,a,o,!1,null,null,null);e["default"]=I.exports}}]);
//# sourceMappingURL=chunk-4e6e6113.0c3a7d80.js.map