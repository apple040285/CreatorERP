(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4e5ad586"],{"95ca":function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("b-tabs",{attrs:{"content-class":"col-12 mt-1 mt-md-0",pills:"","nav-wrapper-class":"col-12"}},[r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"FileTextIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Basic Information")))])]},proxy:!0}])},[t.data?r("basic-information",{attrs:{"basic-information":t.data}}):t._e()],1),r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"EditIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Other Remark")))])]},proxy:!0}])},[t.data?r("other-remark",{attrs:{"other-remark":t.data}}):t._e()],1)],1)],1)},o=[],n=r("f902"),c=r("6190"),l=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.code")}},[r("b-form-input",{attrs:{value:t.basicInformation.code,placeholder:t.$t("AccountList.code"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.category")}},[r("b-form-input",{attrs:{value:t.$t("AccountList."+t.basicInformation.type),placeholder:t.$t("AccountList.category"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.bank")}},[r("b-form-input",{attrs:{value:t.basicInformation.bank&&t.basicInformation.bank.name,placeholder:t.$t("AccountList.bank"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.name")}},[r("b-form-input",{attrs:{value:t.basicInformation.name,placeholder:t.$t("AccountList.name"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.currency")}},[r("b-form-input",{attrs:{value:t.basicInformation.currency&&t.basicInformation.currency.name,placeholder:t.$t("AccountList.currency"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.amount")}},[r("b-form-input",{attrs:{value:t.basicInformation.amount,placeholder:t.$t("AccountList.amount"),type:"text",readonly:""}})],1)],1)],1)],1)},s=[],u=r("1947"),b=r("11de"),i=r("8226"),p=r("4797"),f=r("a15b"),d=r("b28b"),m=r("205f"),y={components:{BButton:u["a"],BForm:b["a"],BFormGroup:i["a"],BFormInput:p["a"],BRow:f["a"],BCol:d["a"],BCard:m["a"]},props:{basicInformation:{type:Object,default:function(){}}}},h=y,O=r("2877"),j=Object(O["a"])(h,l,s,!1,null,null,null),g=j.exports,$=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-form",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.creator&&t.otherRemark.creator.name,placeholder:t.$t("created_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.created_at,placeholder:t.$t("created_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.editor&&t.otherRemark.editor.name,placeholder:t.$t("updated_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.updated_at,placeholder:t.$t("updated_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.status")}},[r("b-form-input",{attrs:{value:t.otherRemark.status,placeholder:t.$t("AccountList.status"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("AccountList.disable_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.disable_at,placeholder:t.$t("AccountList.disable_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("remark")}},[r("b-form-textarea",{attrs:{placeholder:t.$t("remark"),rows:"3",value:t.otherRemark.remark,readonly:""}})],1)],1)],1)],1)],1)},v=[],k=r("9c7d"),_={components:{BButton:u["a"],BForm:b["a"],BFormGroup:i["a"],BFormInput:p["a"],BRow:f["a"],BCol:d["a"],BCard:m["a"],BFormTextarea:k["a"]},props:{otherRemark:{type:Object,default:function(){}}}},w=_,B=Object(O["a"])(w,$,v,!1,null,null,null),x=B.exports,A=r("7f80"),L={components:{BTabs:n["a"],BTab:c["a"],BasicInformation:g,OtherRemark:x},data:function(){return{data:{}}},mounted:function(){var t=this;this.$route.query.id&&A["a"].get("bank_accounts/".concat(this.$route.query.id)).then((function(e){t.data=e.data})).catch((function(t){return console.error(t)}))}},I=L,R=Object(O["a"])(I,a,o,!1,null,null,null);e["default"]=R.exports},a15b:function(t,e,r){"use strict";r.d(e,"a",(function(){return $}));var a=r("b42e"),o=r("c637"),n=r("a723"),c=r("2326"),l=r("228e"),s=r("6c06"),u=r("b508"),b=r("d82f"),i=r("cf75"),p=r("fa73");function f(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?f(Object(r),!0).forEach((function(e){m(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function m(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var y=["start","end","center"],h=Object(u["a"])((function(t,e){return e=Object(p["g"])(Object(p["f"])(e)),e?Object(p["c"])(["row-cols",t,e].filter(s["a"]).join("-")):null})),O=Object(u["a"])((function(t){return Object(p["c"])(t.replace("cols",""))})),j=[],g=function(){var t=Object(l["b"])().reduce((function(t,e){return t[Object(i["g"])(e,"cols")]=Object(i["c"])(n["o"]),t}),Object(b["c"])(null));return j=Object(b["h"])(t),Object(i["d"])(Object(b["m"])(d(d({},t),{},{alignContent:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(y,"between","around","stretch"),t)})),alignH:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(y,"between","around"),t)})),alignV:Object(i["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(y,"baseline","stretch"),t)})),noGutters:Object(i["c"])(n["g"],!1),tag:Object(i["c"])(n["r"],"div")})),o["nb"])},$={name:o["nb"],functional:!0,get props(){return delete this.props,this.props=g(),this.props},render:function(t,e){var r,o=e.props,n=e.data,c=e.children,l=o.alignV,s=o.alignH,u=o.alignContent,b=[];return j.forEach((function(t){var e=h(O(t),o[t]);e&&b.push(e)})),b.push((r={"no-gutters":o.noGutters},m(r,"align-items-".concat(l),l),m(r,"justify-content-".concat(s),s),m(r,"align-content-".concat(u),u),r)),t(o.tag,Object(a["a"])(n,{staticClass:"row",class:b}),c)}}}}]);
//# sourceMappingURL=chunk-4e5ad586.bb517234.js.map