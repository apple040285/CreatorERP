(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4e59df48"],{7333:function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("b-tabs",{attrs:{"content-class":"col-12 mt-1 mt-md-0",pills:"","nav-wrapper-class":"col-12"}},[r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"FileTextIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Basic Information")))])]},proxy:!0}])},[t.data?r("basic-information",{attrs:{"basic-information":t.data}}):t._e()],1),r("b-tab",{scopedSlots:t._u([{key:"title",fn:function(){return[r("feather-icon",{staticClass:"mr-50",attrs:{icon:"EditIcon",size:"18"}}),r("span",{staticClass:"font-weight-bold"},[t._v(t._s(t.$t("Other Remark")))])]},proxy:!0}])},[t.data?r("other-remark",{attrs:{"other-remark":t.data}}):t._e()],1)],1)],1)},o=[],n=r("f902"),c=r("6190"),l=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.code")}},[r("b-form-input",{attrs:{value:t.basicInformation.code,placeholder:t.$t("BankList.code"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.swiftCode")}},[r("b-form-input",{attrs:{value:t.basicInformation.swift_code,placeholder:t.$t("BankList.swiftCode"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.name")}},[r("b-form-input",{attrs:{value:t.basicInformation.name,placeholder:t.$t("BankList.name"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.englishName")}},[r("b-form-input",{attrs:{value:t.basicInformation.alias,placeholder:t.$t("BankList.englishName"),type:"text",readonly:""}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.telephone")}},[r("b-form-input",{attrs:{value:t.basicInformation.phone,placeholder:t.$t("BankList.telephone"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("BankList.creditCardFeeRates")}},[r("b-form-input",{attrs:{value:t.basicInformation.rate,placeholder:t.$t("BankList.creditCardFeeRates"),type:"text",readonly:""}})],1)],1)],1)],1)},s=[],i=r("1947"),b=r("11de"),u=r("8226"),p=r("4797"),f=r("a15b"),d=r("b28b"),m=r("205f"),h={components:{BButton:i["a"],BForm:b["a"],BFormGroup:u["a"],BFormInput:p["a"],BRow:f["a"],BCol:d["a"],BCard:m["a"]},props:{basicInformation:{type:Object,default:function(){}}}},O=h,y=r("2877"),j=Object(y["a"])(O,l,s,!1,null,null,null),g=j.exports,k=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("b-card",[r("b-form",[r("b-row",[r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.creator&&t.otherRemark.creator.name,placeholder:t.$t("created_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("created_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.created_at,placeholder:t.$t("created_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_by")}},[r("b-form-input",{attrs:{value:t.otherRemark.editor&&t.otherRemark.editor.name,placeholder:t.$t("updated_by"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("updated_at")}},[r("b-form-input",{attrs:{value:t.otherRemark.updated_at,placeholder:t.$t("updated_at"),type:"text",readonly:""}})],1)],1),r("b-col",{attrs:{cols:"6"}},[r("b-form-group",{attrs:{label:t.$t("remark")}},[r("b-form-textarea",{attrs:{placeholder:t.$t("remark"),rows:"3",value:t.otherRemark.remark,readonly:""}})],1)],1)],1)],1)],1)},B=[],v=r("9c7d"),w={components:{BButton:i["a"],BForm:b["a"],BFormGroup:u["a"],BFormInput:p["a"],BRow:f["a"],BCol:d["a"],BCard:m["a"],BFormTextarea:v["a"]},props:{otherRemark:{type:Object,default:function(){}}}},$=w,_=Object(y["a"])($,k,B,!1,null,null,null),x=_.exports,C=r("7f80"),R={components:{BTabs:n["a"],BTab:c["a"],BasicInformation:g,OtherRemark:x},data:function(){return{data:{}}},mounted:function(){var t=this;this.$route.query.id&&C["a"].get("banks/".concat(this.$route.query.id)).then((function(e){t.data=e.data})).catch((function(t){return console.error(t)}))}},I=R,L=Object(y["a"])(I,a,o,!1,null,null,null);e["default"]=L.exports},a15b:function(t,e,r){"use strict";r.d(e,"a",(function(){return k}));var a=r("b42e"),o=r("c637"),n=r("a723"),c=r("2326"),l=r("228e"),s=r("6c06"),i=r("b508"),b=r("d82f"),u=r("cf75"),p=r("fa73");function f(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?f(Object(r),!0).forEach((function(e){m(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function m(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}var h=["start","end","center"],O=Object(i["a"])((function(t,e){return e=Object(p["g"])(Object(p["f"])(e)),e?Object(p["c"])(["row-cols",t,e].filter(s["a"]).join("-")):null})),y=Object(i["a"])((function(t){return Object(p["c"])(t.replace("cols",""))})),j=[],g=function(){var t=Object(l["b"])().reduce((function(t,e){return t[Object(u["g"])(e,"cols")]=Object(u["c"])(n["o"]),t}),Object(b["c"])(null));return j=Object(b["h"])(t),Object(u["d"])(Object(b["m"])(d(d({},t),{},{alignContent:Object(u["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"between","around","stretch"),t)})),alignH:Object(u["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"between","around"),t)})),alignV:Object(u["c"])(n["r"],null,(function(t){return Object(c["a"])(Object(c["b"])(h,"baseline","stretch"),t)})),noGutters:Object(u["c"])(n["g"],!1),tag:Object(u["c"])(n["r"],"div")})),o["kb"])},k={name:o["kb"],functional:!0,get props(){return delete this.props,this.props=g(),this.props},render:function(t,e){var r,o=e.props,n=e.data,c=e.children,l=o.alignV,s=o.alignH,i=o.alignContent,b=[];return j.forEach((function(t){var e=O(y(t),o[t]);e&&b.push(e)})),b.push((r={"no-gutters":o.noGutters},m(r,"align-items-".concat(l),l),m(r,"justify-content-".concat(s),s),m(r,"align-content-".concat(i),i),r)),t(o.tag,Object(a["a"])(n,{staticClass:"row",class:b}),c)}}}}]);
//# sourceMappingURL=chunk-4e59df48.d44177ce.js.map