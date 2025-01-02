export const __webpack_id__=857;export const __webpack_ids__=[857];export const __webpack_modules__={8062:(e,t,l)=>{l.d(t,{A:()=>s});var o=l(6798),n=l.n(o)()((function(e){return e[1]}));n.push([e.id,"#nav_menu{background:red;background:linear-gradient(90deg,red,#c60000 35%,#9b0000);color:#f5f5f5}",""]);const s=n},9857:(e,t,l)=>{l.r(t),l.d(t,{default:()=>ne});var o=l(1431),n={id:"nav_menu",class:"flex-no-wrap relative flex w-full items-center justify-between lg:flex-wrap lg:justify-start lg:py-4"},s={class:"flex w-full flex-wrap items-center justify-between px-3"},a={class:"!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto",id:"navbarSupportedContent1","data-twe-collapse-item":""},i={class:"list-style-none me-auto flex flex-col ps-0 lg:flex-row","data-twe-navbar-nav-ref":""},r={class:"mb-4 lg:mb-0 lg:pe-2","data-twe-nav-item-ref":""},d={class:"mb-4 lg:mb-0 lg:pe-2","data-twe-nav-item-ref":""},c={class:"relative flex items-center"},u={class:"bg-white w-full max-w-screen-xl"},m={class:"grid-cols-2 w-full inline-flex flex-row flex-wrap"},v={class:"w-2/3"},p={class:"w-1/3"};var h={class:"flex flex-column flex-wrap w-full"},f={class:"w-full items-center mt-5 pt-2 mb-3"},g={class:"items-center w-full justify-center flex"},w=["src"],q={class:"w-full text-center"},k={key:0,class:"mt-4 font-bold"},x={class:"w-full text-center"},E={class:"mt-4 font-bold text-xl"},N={class:"font-bold text-lg"},V={class:"ml-8 mt-3 p-3"},R={key:0},I={key:1},y={key:2},b={key:3},B={key:4};var S=l(2505),_=l.n(S);const C={props:{requestid:String,selectedRequest:String},data:function(){return{item:null,showRetrieveRequest:!1,request:{}}},methods:{getImagePath:function(e){return e?"/images/".concat(e):""}},watch:{selectedRequest:function(e,t){var l=this;console.log("New Value:",e),console.log("Old Value:",t),_().get("/request/".concat(e)).then((function(e){console.log(e.data),l.request=e.data})).catch((function(e){console.error(e)}))}},mounted:function(){var e=this;this.selectedRequest&&_().get("/request/".concat(this.selectedRequest)).then((function(t){console.log("Fetched request data on mount:",t.data),e.request=t.data})).catch((function(e){console.error("Error fetching data on mount:",e)}))}};var A=l(6262);const D=(0,A.A)(C,[["render",function(e,t,l,n,s,a){var i,r,d,c,u,m,v,p,S,_,C,A,D,T,L,H,j,M,P,O;return(0,o.openBlock)(),(0,o.createElementBlock)("section",null,[(0,o.createElementVNode)("div",h,[(0,o.createElementVNode)("div",f,[(0,o.createElementVNode)("div",g,[null!==(i=s.request)&&void 0!==i&&null!==(i=i.details)&&void 0!==i&&i.picture?((0,o.openBlock)(),(0,o.createElementBlock)("img",{key:0,src:a.getImagePath(null===(r=s.request)||void 0===r||null===(r=r.details)||void 0===r?void 0:r.picture),alt:"Image Item"},null,8,w)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",q,[null!==(d=s.request)&&void 0!==d&&null!==(d=d.details)&&void 0!==d&&d.picture?((0,o.openBlock)(),(0,o.createElementBlock)("div",k,"(Image for Reference)")):(0,o.createCommentVNode)("",!0)])]),(0,o.createElementVNode)("div",x,[(0,o.createElementVNode)("div",E,(0,o.toDisplayString)(null===(c=s.request)||void 0===c?void 0:c.title),1),(0,o.createElementVNode)("div",N,(0,o.toDisplayString)(null===(u=s.request)||void 0===u?void 0:u.description),1)]),(0,o.createElementVNode)("div",V,[null!==(m=s.request)&&void 0!==m&&null!==(m=m.details)&&void 0!==m&&m.shape&&"N/A"!=(null===(v=s.request)||void 0===v||null===(v=v.details)||void 0===v?void 0:v.shape)?((0,o.openBlock)(),(0,o.createElementBlock)("div",R,"SHAPE: "+(0,o.toDisplayString)(null===(p=s.request)||void 0===p||null===(p=p.details)||void 0===p?void 0:p.shape),1)):(0,o.createCommentVNode)("",!0),null!==(S=s.request)&&void 0!==S&&null!==(S=S.details)&&void 0!==S&&S.color&&"N/A"!=(null===(_=s.request)||void 0===_||null===(_=_.details)||void 0===_?void 0:_.color)?((0,o.openBlock)(),(0,o.createElementBlock)("div",I,"COLOR: "+(0,o.toDisplayString)(null===(C=s.request)||void 0===C||null===(C=C.details)||void 0===C?void 0:C.color),1)):(0,o.createCommentVNode)("",!0),null!==(A=s.request)&&void 0!==A&&null!==(A=A.details)&&void 0!==A&&A.length&&"N/A"!=(null===(D=s.request)||void 0===D||null===(D=D.details)||void 0===D?void 0:D.length)?((0,o.openBlock)(),(0,o.createElementBlock)("div",y,"LENGTH: "+(0,o.toDisplayString)(null===(T=s.request)||void 0===T||null===(T=T.details)||void 0===T?void 0:T.length),1)):(0,o.createCommentVNode)("",!0),null!==(L=s.request)&&void 0!==L&&null!==(L=L.details)&&void 0!==L&&L.width&&"N/A"!=(null===(H=s.request)||void 0===H||null===(H=H.details)||void 0===H?void 0:H.width)?((0,o.openBlock)(),(0,o.createElementBlock)("div",b,"WIDTH: "+(0,o.toDisplayString)(null===(j=s.request)||void 0===j||null===(j=j.details)||void 0===j?void 0:j.width),1)):(0,o.createCommentVNode)("",!0),null!==(M=s.request)&&void 0!==M&&null!==(M=M.details)&&void 0!==M&&M.other_details&&"N/A"!=(null===(P=s.request)||void 0===P||null===(P=P.details)||void 0===P?void 0:P.other_details)?((0,o.openBlock)(),(0,o.createElementBlock)("div",B,"OTHER DETAILS: "+(0,o.toDisplayString)(null===(O=s.request)||void 0===O||null===(O=O.details)||void 0===O?void 0:O.other_details),1)):(0,o.createCommentVNode)("",!0)])])])}]]);var T={class:"bg-white w-full max-w-screen-xl"},L={class:"mt-2 pt-3 flex flex-wrap w-full"},H={class:"inline-flex flex-row mt-3"},j={class:"p3 min-w-64 w-2/3"},M={class:"font-bold text-[#002D74]"},P={class:"bg-stone-100 h-auto p-1"},O={class:"inline-flex flex-row"},z={class:"font-bold px-2 text-xl w-auto"},F={class:"w-1/4"},Z=["onClick"],U={class:"pl-2"},$={class:"p3 h-auto min-w-24 w-1/3 text-wrap"},G=["src"],W={key:1,class:"min-w-24 pt-3 flex-wrap font-bold text-[#002D74] row-span-5 text-center text-md text-wrap"};var Y=l(8879);const J={setup:function(){return{cookies:(0,Y.lT)().cookies}},props:{requests:Array,requestId:String,selectedRequest:String},data:function(){return{showRetrieveRequest:!1,requestedId:this.requestId,localRequests:[],selectedRequestLocal:this.selectedRequest}},methods:{retrieveRequest:function(e){this.$emit("update:showRetrieveRequest",!0),this.selectedRequestLocal=e,this.$emit("update:selectedRequest",e)},getImagePath:function(e){return e?"/images/".concat(e):""}},mounted:function(){var e=this,t=this.cookies.get("requestid");t&&(this.requestedId=t,console.log(t)),_().get("/requests/".concat(this.requestedId)).then((function(t){console.log(t.data),e.localRequests=t.data})).catch((function(e){console.error(e)}))}},K=(0,A.A)(J,[["render",function(e,t,l,n,s,a){return(0,o.openBlock)(),(0,o.createElementBlock)("section",T,[(0,o.createElementVNode)("div",L,[((0,o.openBlock)(!0),(0,o.createElementBlock)(o.Fragment,null,(0,o.renderList)(s.localRequests,(function(l){var n,s,i,r,d;return(0,o.openBlock)(),(0,o.createElementBlock)("div",{key:l.id,class:"px-3 h-auto min-w-68 w-1/2"},[(0,o.createElementVNode)("div",H,[(0,o.createElementVNode)("div",j,[(0,o.createElementVNode)("div",M,(0,o.toDisplayString)(null===(n=l.category)||void 0===n?void 0:n.type),1),(0,o.createElementVNode)("div",P,[(0,o.createElementVNode)("div",O,[(0,o.createElementVNode)("div",z,(0,o.toDisplayString)(l.title),1),(0,o.createElementVNode)("div",F,[((0,o.openBlock)(),(0,o.createElementBlock)("svg",{onClick:function(e){return a.retrieveRequest(l.id)},xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"mt-1 h-6 w-6"},t[0]||(t[0]=[(0,o.createElementVNode)("path",{"fill-rule":"evenodd",d:"M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Zm8.25-3.75a.75.75 0 0 1 .75.75v2.25h2.25a.75.75 0 0 1 0 1.5h-2.25v2.25a.75.75 0 0 1-1.5 0v-2.25H7.5a.75.75 0 0 1 0-1.5h2.25V7.5a.75.75 0 0 1 .75-.75Z","clip-rule":"evenodd"},null,-1)]),8,Z))])]),(0,o.createElementVNode)("div",U,[(0,o.createElementVNode)("div",null,(0,o.toDisplayString)(l.description),1),(0,o.createElementVNode)("div",null,(0,o.toDisplayString)(l.request_date_label),1),(0,o.createElementVNode)("div",null,(0,o.toDisplayString)(null===(s=l.latest_status)||void 0===s||null===(s=s.status)||void 0===s?void 0:s.type),1)])])]),(0,o.createElementVNode)("div",$,[null!=l&&null!==(i=l.details)&&void 0!==i&&i.picture?((0,o.openBlock)(),(0,o.createElementBlock)("img",{key:0,src:a.getImagePath(null==l||null===(r=l.details)||void 0===r?void 0:r.picture),alt:"Image Item",class:"mt-3 object-contain"},null,8,G)):null!==(d=e.item)&&void 0!==d&&null!==(d=d.details)&&void 0!==d&&d.picture?(0,o.createCommentVNode)("",!0):((0,o.openBlock)(),(0,o.createElementBlock)("div",W," No Image for Reference available "))])])])})),128))])])}]]);var Q=l(8646);const X={name:"Request",setup:function(){return{cookies:(0,Y.lT)().cookies}},props:{requests:Array,requestId:String},data:function(){return{showRequestedItem:!1}},components:{RequestList:K,RetrieveRequest:D},methods:{createRequest:function(){console.log(this.requestId);var e=this.requestId,t=this.cookies.get("requestid");t&&(e=t,console.log(t)),Q.Inertia.visit("/createRequest/".concat(e),["userID",e])},goToItem:function(){Q.Inertia.visit("/dashboardItem")},updateSelectedRequest:function(e){this.showRequestedItem?(this.showRequestedItem=!1,this.showRequestedItem=!0):this.showRequestedItem=!0,this.requestedId=e},logout:function(){Q.Inertia.visit("/logout")}},mounted:function(){this.cookies.get("requestid")||this.cookies.set("requestid",this.requestId)}};var ee=l(5072),te=l.n(ee),le=l(8062),oe={insert:"head",singleton:!1};te()(le.A,oe);le.A.locals;const ne=(0,A.A)(X,[["render",function(e,t,l,h,f,g){var w=(0,o.resolveComponent)("RequestList"),q=(0,o.resolveComponent)("RetrieveRequest");return(0,o.openBlock)(),(0,o.createElementBlock)(o.Fragment,null,[(0,o.createElementVNode)("nav",n,[(0,o.createElementVNode)("div",s,[(0,o.createElementVNode)("div",a,[t[3]||(t[3]=(0,o.createElementVNode)("a",{class:"mb-4 me-5 ms-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0",href:"#"},[(0,o.createElementVNode)("img",{src:"https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp",style:{height:"15px"},alt:"TE Logo",loading:"lazy"})],-1)),(0,o.createElementVNode)("ul",i,[(0,o.createElementVNode)("li",r,[(0,o.createElementVNode)("a",{class:"transition duration-200 hover:ease-in-out motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2",href:"#","data-twe-nav-link-ref":"",onClick:t[0]||(t[0]=function(){return g.createRequest&&g.createRequest.apply(g,arguments)})},"Create a Request")]),(0,o.createElementVNode)("li",d,[(0,o.createElementVNode)("a",{class:"transition duration-200 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2",href:"#","data-twe-nav-link-ref":"",onClick:t[1]||(t[1]=function(){return g.goToItem&&g.goToItem.apply(g,arguments)})},"Search In Items Inventory")])])]),(0,o.createElementVNode)("div",c,[(0,o.createElementVNode)("a",{class:"me-4 text-white",onClick:t[2]||(t[2]=function(){return g.logout&&g.logout.apply(g,arguments)})},t[4]||(t[4]=[(0,o.createElementVNode)("span",{class:"[&>svg]:w-5"},[(0,o.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",fill:"currentColor",class:"bi bi-door-open-fill",viewBox:"0 0 16 16"},[(0,o.createElementVNode)("path",{d:"M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"})])],-1)]))])])]),(0,o.createElementVNode)("section",u,[t[5]||(t[5]=(0,o.createElementVNode)("div",null,"Requests You Have Made",-1)),(0,o.createElementVNode)("div",m,[(0,o.createElementVNode)("div",v,[(0,o.createVNode)(w,{requestId:l.requestId,"onUpdate:selectedRequest":g.updateSelectedRequest},null,8,["requestId","onUpdate:selectedRequest"])]),(0,o.createElementVNode)("div",p,[f.showRequestedItem?((0,o.openBlock)(),(0,o.createBlock)(q,{key:0,selectedRequest:e.requestedId},null,8,["selectedRequest"])):(0,o.createCommentVNode)("",!0)])])])],64)}]])}};