(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2b406626"],{"03d1":function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("layout-vertical",{scopedSlots:t._u([{key:"navbar",fn:function(t){var e=t.toggleVerticalMenuActive;return[a("navbar",{attrs:{"toggle-vertical-menu-active":e}})]}}])},[a("router-view")],1)},r=[],o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"vertical-layout h-100",class:[t.layoutClasses],attrs:{"data-col":t.isNavMenuHidden?"1-column":null}},[a("b-navbar",{staticClass:"header-navbar navbar navbar-shadow align-items-center",class:[t.navbarTypeClass],attrs:{toggleable:!1,variant:t.navbarBackgroundColor}},[t._t("navbar",[a("app-navbar-vertical-layout",{attrs:{"toggle-vertical-menu-active":t.toggleVerticalMenuActive}})],{toggleVerticalMenuActive:t.toggleVerticalMenuActive,navbarBackgroundColor:t.navbarBackgroundColor,navbarTypeClass:t.navbarTypeClass.concat(["header-navbar navbar navbar-shadow align-items-center"])})],2),t.isNavMenuHidden?t._e():a("vertical-nav-menu",{attrs:{"is-vertical-menu-active":t.isVerticalMenuActive,"toggle-vertical-menu-active":t.toggleVerticalMenuActive},scopedSlots:t._u([{key:"header",fn:function(e){return[t._t("vertical-menu-header",null,null,e)]}}],null,!0)}),a("div",{staticClass:"sidenav-overlay",class:t.overlayClasses,on:{click:function(e){t.isVerticalMenuActive=!1}}}),a("transition",{attrs:{name:t.routerTransition,mode:"out-in"}},[a(t.layoutContentRenderer,{key:"layout-content-renderer-left"===t.layoutContentRenderer?t.$route.meta.navActiveLink||t.$route.name:null,tag:"component",scopedSlots:t._u([t._l(t.$scopedSlots,(function(e,a){return{key:a,fn:function(e){return[t._t(a,null,null,e)]}}}))],null,!0)})],1),a("footer",{staticClass:"footer footer-light",class:[t.footerTypeClass]},[t._t("footer",[a("app-footer")])],2),t._t("customizer")],2)},l=[],i=a("ed09"),s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"navbar-container d-flex content align-items-center"},[a("ul",{staticClass:"nav navbar-nav d-xl-none"},[a("li",{staticClass:"nav-item"},[a("b-link",{staticClass:"nav-link",on:{click:t.toggleVerticalMenuActive}},[a("feather-icon",{attrs:{icon:"MenuIcon",size:"21"}})],1)],1)]),a("div",{staticClass:"bookmark-wrapper align-items-center flex-grow-1 d-none d-lg-flex"},[a("bookmarks")],1),a("b-navbar-nav",{staticClass:"nav align-items-center ml-auto"},[a("locale"),a("dark-Toggler",{staticClass:"d-none d-lg-block"}),a("search-bar"),a("cart-dropdown"),a("notification-dropdown"),a("user-dropdown")],1)],1)},c=[],u=a("aa59"),d=a("042b"),v=a("6957"),f=a("e2f5"),b=a("809a"),p=a("9f5c"),g=a("8a2e"),C=a("5c02"),m=a("eef9"),y={components:{BLink:u["a"],BNavbarNav:d["a"],Bookmarks:v["a"],Locale:f["a"],SearchBar:b["a"],DarkToggler:p["a"],CartDropdown:g["a"],NotificationDropdown:C["a"],UserDropdown:m["a"]},props:{toggleVerticalMenuActive:{type:Function,default:function(){}}}},h=y,k=a("2877"),w=Object(k["a"])(h,s,c,!1,null,null,null),_=w.exports,x=a("62cb"),M=a("b8f2"),V=a("d0b9"),A=a("1ae3"),T=a("e08f"),B=a("0d19"),L=a("2c28"),N=a("32b8"),$=a("1dff"),S={watch:{$route:function(){this.$store.state.app.windowWidth<$["a"].xl&&(this.isVerticalMenuActive=!1)}}},j={components:{AppNavbarVerticalLayout:_,AppFooter:x["a"],VerticalNavMenu:L["a"],BNavbar:V["a"],LayoutContentRendererLeftDetached:B["a"],LayoutContentRendererLeft:T["a"],LayoutContentRendererDefault:A["a"]},mixins:[S],computed:{layoutContentRenderer:function(){var t=this.$route.meta.contentRenderer;return"sidebar-left"===t?"layout-content-renderer-left":"sidebar-left-detached"===t?"layout-content-renderer-left-detached":"layout-content-renderer-default"}},setup:function(){var t=Object(M["a"])(),e=t.routerTransition,a=t.navbarBackgroundColor,n=t.navbarType,r=t.footerType,o=t.isNavMenuHidden,l=Object(N["a"])(n,r),s=l.isVerticalMenuActive,c=l.toggleVerticalMenuActive,u=l.isVerticalMenuCollapsed,d=l.layoutClasses,v=l.overlayClasses,f=l.resizeHandler,b=l.navbarTypeClass,p=l.footerTypeClass;return f(),window.addEventListener("resize",f),Object(i["onUnmounted"])((function(){window.removeEventListener("resize",f)})),{isVerticalMenuActive:s,toggleVerticalMenuActive:c,isVerticalMenuCollapsed:u,overlayClasses:v,layoutClasses:d,navbarTypeClass:b,footerTypeClass:p,routerTransition:e,navbarBackgroundColor:a,isNavMenuHidden:o}}},z=j,O=(a("fc62"),Object(k["a"])(z,o,l,!1,null,null,null)),R=O.exports,D=a("cb50"),E=(a("223c"),{components:{LayoutVertical:R,Navbar:D["a"]},data:function(){return{}}}),H=E,F=Object(k["a"])(H,n,r,!1,null,null,null);e["default"]=F.exports},"19a2":function(t,e,a){},"223c":function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"toastification"},[a("div",{staticClass:"d-flex align-items-start"},[a("b-avatar",{staticClass:"mr-75 flex-shrink-0",attrs:{variant:t.variant,size:"1.8rem"}},[a("feather-icon",{attrs:{icon:t.icon,size:"15"}})],1),a("div",{staticClass:"d-flex flex-grow-1"},[a("div",[t.title?a("h5",{staticClass:"mb-0 font-weight-bolder toastification-title",class:"text-"+t.variant,domProps:{textContent:t._s(t.title)}}):t._e(),t.text?a("small",{staticClass:"d-inline-block text-body",domProps:{textContent:t._s(t.text)}}):t._e()]),a("span",{staticClass:"cursor-pointer toastification-close-icon ml-auto ",on:{click:function(e){return t.$emit("close-toast")}}},[t.hideClose?t._e():a("feather-icon",{staticClass:"text-body",attrs:{icon:"XIcon"}})],1)])],1)])},r=[],o=a("e8a3"),l={components:{BAvatar:o["a"]},props:{variant:{type:String,default:"primary"},icon:{type:String,default:null},title:{type:String,default:null},text:{type:String,default:null},hideClose:{type:Boolean,default:!1}}},i=l,s=(a("fc45"),a("2877")),c=Object(s["a"])(i,n,r,!1,null,"55dd3057",null);e["a"]=c.exports},bb72:function(t,e,a){},fc45:function(t,e,a){"use strict";a("19a2")},fc62:function(t,e,a){"use strict";a("bb72")}}]);
//# sourceMappingURL=chunk-2b406626.15d9a647.js.map