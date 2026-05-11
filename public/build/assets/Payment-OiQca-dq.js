import{_ as H,r as w,o as d,c as f,t as h,g as m,a as i,j as T,D as Z,d as x,k as ue,v as re,h as _,S as fe,F as Q,f as oe,n as ge,e as ve}from"./app-DDWq6xNd.js";import{O as be,P as ke}from"./PaymentDetails-B-BbEuVR.js";import{G as we}from"./GdPr_Page-bmAU7mRu.js";import{m as Ae,F as Ee,g as Ce,k as Se,p as Ue,a as ze}from"./kkiapay-c0d1e8RR.js";import{s as je}from"./toast-BJcrwnTR.js";import"./CartSVG-awC0bc9l.js";const Pe={name:"offline_method",props:["trx_id","code","amount","offline_method","loading"],data(){return{fileName:""}},methods:{submit(){this.$parent.payment()},imageUpload(e){let t=e.target.files[0];this.$parent.offline_method_file=t,this.fileName=(t==null?void 0:t.name)||""}}},Te={key:0,href:"javascript:void(0)",class:"btn btn-primary w-100","data-bs-toggle":"modal","data-bs-target":"#offline"},Le={class:"modal fade LogoutModal",tabindex:"-1","aria-labelledby":"offline_modal","aria-hidden":"true",id:"offline"},Oe={class:"modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable"},Ie={class:"modal-content"},Ne={class:"modal-header"},Be={class:"modal-title"},Re={class:"modal-body"},Fe={class:"row"},De={class:"col-lg-12"},Me={class:"form-group"},$e={key:0,class:"mt-2 text-secondary"},Ve={key:0,class:"col-lg-12 mt-2"},Ge=["innerHTML"],Ye={class:"col-lg-12 text-center mt-3"};function qe(e,t,n,l,a,o){const b=w("loading_button");return d(),f("div",null,[n.offline_method.name?(d(),f("a",Te,h(e.lang.pay_now),1)):m("",!0),i("div",Le,[i("div",Oe,[i("div",Ie,[i("div",Ne,[i("h5",Be,h(e.lang.pay_with)+" "+h(n.offline_method.name),1),t[2]||(t[2]=i("button",{type:"button",class:"close","data-bs-dismiss":"modal","aria-label":"Close",id:"offline_payment_close"},[i("i",{class:"ri-close-large-fill"})],-1))]),i("div",Re,[i("div",Fe,[i("div",De,[i("div",Me,[i("label",null,h(e.lang.upload_file),1),i("input",{type:"file",id:"upload",onChange:t[0]||(t[0]=p=>o.imageUpload(p)),multiple:"",class:"form-control"},null,32),a.fileName?(d(),f("p",$e,h(a.fileName),1)):m("",!0)])]),n.offline_method.instructions?(d(),f("div",Ve,[i("label",null,h(e.lang.instructions),1),i("div",{class:"instruction",innerHTML:n.offline_method.instructions},null,8,Ge)])):m("",!0),i("div",Ye,[T(i("button",{onClick:t[1]||(t[1]=(...p)=>o.submit&&o.submit(...p)),class:"btn btn-primary"},h(e.lang.proceed),513),[[Z,!n.loading]]),T(x(b,{class_name:"btn btn-primary"},null,512),[[Z,n.loading]])])])])])])])])}const xe=H(Pe,[["render",qe],["__scopeId","data-v-f7d0a7c7"]]),He={name:"PaymentMethodComponent",props:["value","label","image"],data(){return{}},computed:{isActive(){return!1}},methods:{selectPayment(){this.$emit("update:paymentType",this.value)}}},We={class:"paymentItem"},Ke=["value","id"],Je=["for"],Qe=["src","alt"];function Xe(e,t,n,l,a,o){return d(),f("div",We,[T(i("input",{type:"radio",value:n.value,onChange:t[0]||(t[0]=(...b)=>e.$parent.razorPayRemove&&e.$parent.razorPayRemove(...b)),"onUpdate:modelValue":t[1]||(t[1]=b=>e.$parent.payment_form.payment_type=b),id:n.value,name:"radio"},null,40,Ke),[[ue,e.$parent.payment_form.payment_type]]),i("label",{for:n.value},[i("img",{src:n.image,alt:n.value,class:"img-fluid"},null,8,Qe)],8,Je)])}const Ze=H(He,[["render",Xe],["__scopeId","data-v-541e1833"]]);var X={};Object.defineProperty(X,"__esModule",{value:!0});var et="https://js.stripe.com",tt=["auto","da","de","en","es","es-419","fi","fr","it","ja","nb","nl","pl","pt","sv","zh"],nt=["auto","book","donate","pay"],at=["required","auto"],rt={base:{color:"#32325d",fontFamily:'"Helvetica Neue", Helvetica, sans-serif',fontSmoothing:"antialiased",fontSize:"16px","::placeholder":{color:"#aab7c4"}},invalid:{color:"#fa755a",iconColor:"#fa755a"}},ye=function(){var e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:"v3",t=arguments.length>1?arguments[1]:void 0;if(window.Stripe)t();else{var n=document.createElement("script");n.src="".concat(et,"/").concat(e),n.type="text/javascript",document.getElementsByTagName("head")[0].appendChild(n),n.addEventListener("load",t)}},ot={pk:{type:String,required:!0},mode:{type:String,validator:function(e){return["payment","subscription"].includes(e)}},lineItems:{type:Array},items:{type:Array},successUrl:{type:String,default:window.location.href},cancelUrl:{type:String,default:window.location.href},submitType:{type:String,validator:function(e){return nt.includes(e)}},billingAddressCollection:{type:String,default:"auto",validator:function(e){return at.includes(e)}},clientReferenceId:{type:String},customerEmail:{type:String},sessionId:{type:String},locale:{type:String,default:"auto",validator:function(e){return tt.includes(e)}},shippingAddressCollection:{type:Object,validator:function(e){return e.hasOwnProperty("allowedCountries")}}},it={props:ot,template:"<div></div>",methods:{redirectToCheckout:function(){var e=this;this.$emit("loading",!0),ye("v3",function(){try{var t,n=window.Stripe(e.pk);if(e.sessionId)return void n.redirectToCheckout({sessionId:e.sessionId});if(!((t=e.lineItems)===null||t===void 0)&&t.length&&!e.mode)return void console.error("Error: Property 'mode' is required when using 'lineItems'. See https://stripe.com/docs/js/checkout/redirect_to_checkout#stripe_checkout_redirect_to_checkout-options-mode");var l={billingAddressCollection:e.billingAddressCollection,cancelUrl:e.cancelUrl,clientReferenceId:e.clientReferenceId,customerEmail:e.customerEmail,items:e.items,lineItems:e.lineItems,locale:e.locale,mode:e.mode,shippingAddressCollection:e.shippingAddressCollection,submitType:e.submitType,successUrl:e.successUrl};n.redirectToCheckout(l)}catch(a){console.error(a),e.$emit("error",a)}finally{e.$emit("loading",!1)}})}}};function st(e,t){return e(t={exports:{}},t.exports),t.exports}var lt=st(function(e){var t=function(n){var l,a=Object.prototype,o=a.hasOwnProperty,b=typeof Symbol=="function"?Symbol:{},p=b.iterator||"@@iterator",g=b.asyncIterator||"@@asyncIterator",N=b.toStringTag||"@@toStringTag";function A(s,r,y,v){var c=r&&r.prototype instanceof K?r:K,E=Object.create(c.prototype),G=new ne(v||[]);return E._invoke=function(I,J,k){var U=j;return function(F,Y){if(U===B)throw new Error("Generator is already running");if(U===D){if(F==="throw")throw Y;return de()}for(k.method=F,k.arg=Y;;){var q=k.delegate;if(q){var L=le(q,k);if(L){if(L===C)continue;return L}}if(k.method==="next")k.sent=k._sent=k.arg;else if(k.method==="throw"){if(U===j)throw U=D,k.arg;k.dispatchException(k.arg)}else k.method==="return"&&k.abrupt("return",k.arg);U=B;var S=z(I,J,k);if(S.type==="normal"){if(U=k.done?D:W,S.arg===C)continue;return{value:S.arg,done:k.done}}S.type==="throw"&&(U=D,k.method="throw",k.arg=S.arg)}}}(s,y,G),E}function z(s,r,y){try{return{type:"normal",arg:s.call(r,y)}}catch(v){return{type:"throw",arg:v}}}n.wrap=A;var j="suspendedStart",W="suspendedYield",B="executing",D="completed",C={};function K(){}function M(){}function O(){}var u={};u[p]=function(){return this};var P=Object.getPrototypeOf,R=P&&P(P(ae([])));R&&R!==a&&o.call(R,p)&&(u=R);var V=O.prototype=K.prototype=Object.create(u);function se(s){["next","throw","return"].forEach(function(r){s[r]=function(y){return this._invoke(r,y)}})}function ee(s){var r;this._invoke=function(y,v){function c(){return new Promise(function(E,G){(function I(J,k,U,F){var Y=z(s[J],s,k);if(Y.type!=="throw"){var q=Y.arg,L=q.value;return L&&typeof L=="object"&&o.call(L,"__await")?Promise.resolve(L.__await).then(function(S){I("next",S,U,F)},function(S){I("throw",S,U,F)}):Promise.resolve(L).then(function(S){q.value=S,U(q)},function(S){return I("throw",S,U,F)})}F(Y.arg)})(y,v,E,G)})}return r=r?r.then(c,c):c()}}function le(s,r){var y=s.iterator[r.method];if(y===l){if(r.delegate=null,r.method==="throw"){if(s.iterator.return&&(r.method="return",r.arg=l,le(s,r),r.method==="throw"))return C;r.method="throw",r.arg=new TypeError("The iterator does not provide a 'throw' method")}return C}var v=z(y,s.iterator,r.arg);if(v.type==="throw")return r.method="throw",r.arg=v.arg,r.delegate=null,C;var c=v.arg;return c?c.done?(r[s.resultName]=c.value,r.next=s.nextLoc,r.method!=="return"&&(r.method="next",r.arg=l),r.delegate=null,C):c:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,C)}function _e(s){var r={tryLoc:s[0]};1 in s&&(r.catchLoc=s[1]),2 in s&&(r.finallyLoc=s[2],r.afterLoc=s[3]),this.tryEntries.push(r)}function te(s){var r=s.completion||{};r.type="normal",delete r.arg,s.completion=r}function ne(s){this.tryEntries=[{tryLoc:"root"}],s.forEach(_e,this),this.reset(!0)}function ae(s){if(s){var r=s[p];if(r)return r.call(s);if(typeof s.next=="function")return s;if(!isNaN(s.length)){var y=-1,v=function c(){for(;++y<s.length;)if(o.call(s,y))return c.value=s[y],c.done=!1,c;return c.value=l,c.done=!0,c};return v.next=v}}return{next:de}}function de(){return{value:l,done:!0}}return M.prototype=V.constructor=O,O.constructor=M,O[N]=M.displayName="GeneratorFunction",n.isGeneratorFunction=function(s){var r=typeof s=="function"&&s.constructor;return!!r&&(r===M||(r.displayName||r.name)==="GeneratorFunction")},n.mark=function(s){return Object.setPrototypeOf?Object.setPrototypeOf(s,O):(s.__proto__=O,N in s||(s[N]="GeneratorFunction")),s.prototype=Object.create(V),s},n.awrap=function(s){return{__await:s}},se(ee.prototype),ee.prototype[g]=function(){return this},n.AsyncIterator=ee,n.async=function(s,r,y,v){var c=new ee(A(s,r,y,v));return n.isGeneratorFunction(r)?c:c.next().then(function(E){return E.done?E.value:c.next()})},se(V),V[N]="Generator",V[p]=function(){return this},V.toString=function(){return"[object Generator]"},n.keys=function(s){var r=[];for(var y in s)r.push(y);return r.reverse(),function v(){for(;r.length;){var c=r.pop();if(c in s)return v.value=c,v.done=!1,v}return v.done=!0,v}},n.values=ae,ne.prototype={constructor:ne,reset:function(s){if(this.prev=0,this.next=0,this.sent=this._sent=l,this.done=!1,this.delegate=null,this.method="next",this.arg=l,this.tryEntries.forEach(te),!s)for(var r in this)r.charAt(0)==="t"&&o.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=l)},stop:function(){this.done=!0;var s=this.tryEntries[0].completion;if(s.type==="throw")throw s.arg;return this.rval},dispatchException:function(s){if(this.done)throw s;var r=this;function y(J,k){return E.type="throw",E.arg=s,r.next=J,k&&(r.method="next",r.arg=l),!!k}for(var v=this.tryEntries.length-1;v>=0;--v){var c=this.tryEntries[v],E=c.completion;if(c.tryLoc==="root")return y("end");if(c.tryLoc<=this.prev){var G=o.call(c,"catchLoc"),I=o.call(c,"finallyLoc");if(G&&I){if(this.prev<c.catchLoc)return y(c.catchLoc,!0);if(this.prev<c.finallyLoc)return y(c.finallyLoc)}else if(G){if(this.prev<c.catchLoc)return y(c.catchLoc,!0)}else{if(!I)throw new Error("try statement without catch or finally");if(this.prev<c.finallyLoc)return y(c.finallyLoc)}}}},abrupt:function(s,r){for(var y=this.tryEntries.length-1;y>=0;--y){var v=this.tryEntries[y];if(v.tryLoc<=this.prev&&o.call(v,"finallyLoc")&&this.prev<v.finallyLoc){var c=v;break}}c&&(s==="break"||s==="continue")&&c.tryLoc<=r&&r<=c.finallyLoc&&(c=null);var E=c?c.completion:{};return E.type=s,E.arg=r,c?(this.method="next",this.next=c.finallyLoc,C):this.complete(E)},complete:function(s,r){if(s.type==="throw")throw s.arg;return s.type==="break"||s.type==="continue"?this.next=s.arg:s.type==="return"?(this.rval=this.arg=s.arg,this.method="return",this.next="end"):s.type==="normal"&&r&&(this.next=r),C},finish:function(s){for(var r=this.tryEntries.length-1;r>=0;--r){var y=this.tryEntries[r];if(y.finallyLoc===s)return this.complete(y.completion,y.afterLoc),te(y),C}},catch:function(s){for(var r=this.tryEntries.length-1;r>=0;--r){var y=this.tryEntries[r];if(y.tryLoc===s){var v=y.completion;if(v.type==="throw"){var c=v.arg;te(y)}return c}}throw new Error("illegal catch attempt")},delegateYield:function(s,r,y){return this.delegate={iterator:ae(s),resultName:r,nextLoc:y},this.method==="next"&&(this.arg=l),C}},n}(e.exports);try{regeneratorRuntime=t}catch{Function("r","regeneratorRuntime = r")(t)}}),me=lt;function dt(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var mt=dt;function pe(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(e);t&&(l=l.filter(function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable})),n.push.apply(n,l)}return n}function pt(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?pe(Object(n),!0).forEach(function(l){mt(e,l,n[l])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):pe(Object(n)).forEach(function(l){Object.defineProperty(e,l,Object.getOwnPropertyDescriptor(n,l))})}return e}var ct="card",ut={props:{pk:{type:String,required:!0},stripeAccount:{type:String},apiVersion:{type:String},locale:{type:String,default:"auto"},classes:{type:Object,default:function(){return{}}},elementStyle:{type:Object,default:function(){return rt}},value:{type:String},hidePostalCode:Boolean,iconStyle:{type:String,default:"default",validator:function(e){return["solid","default"].includes(e)}},hideIcon:Boolean,disabled:Boolean},data:function(){return{loading:!1,stripe:null,elements:null,card:null}},computed:{form:function(){return document.getElementById("stripe-element-form")}},methods:{submit:function(){this.$refs.submitButtonRef.click()}},mounted:function(){var e=this;ye(this.apiVersion,function(){var t={stripeAccount:e.stripeAccount,apiVersion:e.apiVersion,locale:e.locale},n={classes:e.classes,style:e.elementStyle,value:e.value,hidePostalCode:e.hidePostalCode,iconStyle:e.iconStyle,hideIcon:e.hideIcon,disabled:e.disabled};e.stripe=window.Stripe(e.pk,t),e.element=e.stripe.elements().create(ct,n),e.element.mount("#stripe-element-mount-point"),e.element.on("change",function(l){var a=document.getElementById("stripe-element-errors");l.error?a.textContent=l.error.message:a.textContent=""}),e.form.addEventListener("submit",function(l){var a,o,b,p;return me.async(function(g){for(;;)switch(g.prev=g.next){case 0:return g.prev=0,e.$emit("loading",!0),l.preventDefault(),a=pt({},e.element),e.amount&&(a.amount=e.amount),g.next=7,me.awrap(e.stripe.createToken(a));case 7:if(o=g.sent,b=o.token,!(p=o.error)){g.next=15;break}return document.getElementById("stripe-element-errors").textContent=p.message,e.$emit("error",p),g.abrupt("return");case 15:e.$emit("token",b),g.next=22;break;case 18:g.prev=18,g.t0=g.catch(0),console.error(g.t0),e.$emit("error",g.t0);case 22:return g.prev=22,e.$emit("loading",!1),g.finish(22);case 25:case"end":return g.stop()}},null,null,[[0,18,22,25]])})})}};function yt(e,t,n,l,a,o,b,p,g,N){const A=typeof n=="function"?n.options:n;let z;if(e&&e.render&&(A.render=e.render,A.staticRenderFns=e.staticRenderFns,A._compiled=!0),A._scopeId=l,t&&(z=function(j){t.call(this,p(j))}),z)if(A.functional){const j=A.render;A.render=function(W,B){return z.call(B),j(W,B)}}else{const j=A.beforeCreate;A.beforeCreate=j?[].concat(j,z):[z]}return n}const ht=typeof navigator<"u"&&/msie [6-9]\\b/.test(navigator.userAgent.toLowerCase());function _t(e){return(t,n)=>ft(t,n)}let ie;const ce={};function ft(e,t){const n=ht?t.media||"default":e,l=ce[n]||(ce[n]={ids:new Set,styles:[]});if(!l.ids.has(e)){l.ids.add(e);let a=t.source;if(t.map&&(a+=`
/*# sourceURL=`+t.map.sources[0]+" */",a+=`
/*# sourceMappingURL=data:application/json;base64,`+btoa(unescape(encodeURIComponent(JSON.stringify(t.map))))+" */"),l.element||(l.element=document.createElement("style"),l.element.type="text/css",t.media&&l.element.setAttribute("media",t.media),ie===void 0&&(ie=document.head||document.getElementsByTagName("head")[0]),ie.appendChild(l.element)),"styleSheet"in l.element)l.styles.push(a),l.element.styleSheet.cssText=l.styles.filter(Boolean).join(`
`);else{const o=l.ids.size-1,b=document.createTextNode(a),p=l.element.childNodes;p[o]&&l.element.removeChild(p[o]),p.length?l.element.insertBefore(b,p[o]):l.element.appendChild(b)}}}const gt=ut;var he=function(){var e=this.$createElement,t=this._self._c||e;return t("div",[t("form",{attrs:{id:"stripe-element-form"}},[t("div",{attrs:{id:"stripe-element-mount-point"}}),this._v(" "),this._t("stripe-element-errors",[t("div",{attrs:{id:"stripe-element-errors",role:"alert"}})]),this._v(" "),t("button",{ref:"submitButtonRef",staticClass:"hide",attrs:{type:"submit"}})],2)])},vt=[];he._withStripped=!0;const bt=function(e){e&&e("data-v-39e29cc6_0",{source:`



































































































































/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement[data-v-39e29cc6] {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus[data-v-39e29cc6] {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid[data-v-39e29cc6] {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill[data-v-39e29cc6] {
  background-color: #fefde5 !important;
}
.hide[data-v-39e29cc6] {
  visibility: hidden;
}
`,map:{version:3,sources:["/home/centipede/Documents/workspace/personal/vue-stripe/vue-stripe-checkout/src/elements/Card.vue"],names:[],mappings:";;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;AAoIA;;;EAGA;AACA;EACA,sBAAA;;EAEA,YAAA;;EAEA,kBAAA;;EAEA,6BAAA;EACA,kBAAA;EACA,uBAAA;;EAEA,+BAAA;EACA,yCAAA;EACA,iCAAA;AACA;AAEA;EACA,+BAAA;AACA;AAEA;EACA,qBAAA;AACA;AAEA;EACA,oCAAA;AACA;AAEA;EACA,kBAAA;AACA",file:"Card.vue",sourcesContent:[`<template>
  <div>
    <form id="stripe-element-form">
      <div id="stripe-element-mount-point"></div>
      <slot name="stripe-element-errors">
        <div id="stripe-element-errors" role="alert"></div>
      </slot>
      <button ref="submitButtonRef" type="submit" class="hide"></button>
    </form>
  </div>
</template>

<script>
import { loadStripeSdk } from '../load-stripe-sdk';
import { SUPPORTED_ELEMENT_TYPE, DEFAULT_ELEMENT_STYLE } from '../constants';
const ELEMENT_TYPE = 'card';
export default {
  props: {
    pk: {
      type: String,
      required: true,
    },
    stripeAccount: {
      type: String,
    },
    apiVersion: {
      type: String,
    },
    locale: {
      type: String,
      default: 'auto',
    },
    // element specific options
    classes: {
      type: Object,
      default: () => ({}),
    },
    elementStyle: {
      type: Object,
      default: () => (DEFAULT_ELEMENT_STYLE),
    },
    value: {
      type: String,
    },
    hidePostalCode: Boolean,
    iconStyle: {
      type: String,
      default: 'default',
      validator: value => ['solid', 'default'].includes(value),
    },
    hideIcon: Boolean,
    disabled: Boolean,
  },
  data () {
    return {
      loading: false,
      stripe: null,
      elements: null,
      card: null,
    };
  },
  computed: {
    form () {
      return document.getElementById('stripe-element-form');
    },
  },
  methods: {
    submit () {
      this.$refs.submitButtonRef.click();
    },
  },
  mounted () {
    loadStripeSdk(this.apiVersion, () => {
      const stripeOptions = {
        stripeAccount: this.stripeAccount,
        apiVersion: this.apiVersion,
        locale: this.locale,
      };
      const elementOptions = {
        classes: this.classes,
        style: this.elementStyle,
        value: this.value,
        hidePostalCode: this.hidePostalCode,
        iconStyle: this.iconStyle,
        hideIcon: this.hideIcon,
        disabled: this.disabled,
      };

      this.stripe = window.Stripe(this.pk, stripeOptions);
      this.element = this.stripe
        .elements()
        .create(ELEMENT_TYPE, elementOptions)
      this.element.mount('#stripe-element-mount-point');

      this.element.on('change', (event) => {
        var displayError = document.getElementById('stripe-element-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });

      this.form.addEventListener('submit', async (event) => {
        try {
          this.$emit('loading', true);
          event.preventDefault();
          const data = {
            ...this.element
          };
          if (this.amount) data.amount = this.amount;
          const { token, error } = await this.stripe.createToken(data);
          if (error) {
            const errorElement = document.getElementById('stripe-element-errors');
            errorElement.textContent = error.message;
            this.$emit('error', error);
            return;
          }
          this.$emit('token', token);
        } catch (error) {
          console.error(error);
          this.$emit('error', error);
        } finally {
          this.$emit('loading', false);
        }
      });
    });
  }
}
<\/script>

<style scoped>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

.hide {
  visibility: hidden;
}
</style>
`]},media:void 0})},kt="data-v-39e29cc6",wt=yt({render:he,staticRenderFns:vt},bt,gt,kt,!1,void 0,!1,_t);var At={install:function(e,t){var n=t.pk,l=t.stripeAccount,a=t.apiVersion,o=t.locale,b=window.Stripe(n,{stripeAccount:l,apiVersion:a,locale:o}),p=b.elements();e.prototype.$stripe=b,e.prototype.$stripeElements=p}};X.StripeCheckout=it,X.StripeElementCard=wt,X.StripeElementsPlugin=At;const Et={name:"stripe",props:["trx_id","code","amount"],components:{StripeElements:X.StripeElements},data(){return{stripe_form:{name:null,email:null,phone:null,description:null},loading:!1}},methods:{submit(){if(!this.stripe_form.email)return toastr.warning(this.lang.email_required,this.lang.Warning+" !!");if(!this.stripe_form.phone)return toastr.warning(this.lang.phone_required,this.lang.Warning+" !!");this.$refs.stripe_ref.submit()},sendTokenToServer(e){let t="";this.authUser?t=this.getUrl("user/complete-order?code="+this.code):t=this.getUrl("user/complete-order?code="+this.code+"&guest=1"),this.loading=!0,axios.post(t,e).then(n=>{this.loading=!1,n.data.error?toastr.error(this.lang.something_went_wrong,this.lang.Error+" !!"):(toastr.success(n.data.success,this.lang.Success+" !!"),$("#stripe_modal").modal("hide"),this.showStripeModal=!1,this.code?this.$router.push({name:"get.invoice",params:{orderCode:this.code}}):this.$router.push({name:"invoice.list",params:{trx_id:this.trx_id}}))}).catch(n=>{this.loading=!1})},tokenCreated(e){this.stripe_form.token=e;let t={name:this.stripe_form.name,email:this.stripe_form.email,phone:this.stripe_form.phone,source:e.id,payment_type:"stripe",trx_id:this.trx_id,amount:this.amount,description:this.stripe_form.description};this.sendTokenToServer(t)}}},Ct={class:"modal fade",id:"stripe_modal",tabindex:"-1","aria-labelledby":"stripe_modal","aria-hidden":"true"},St={class:"modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable"},Ut={class:"modal-content"},zt={class:"modal-header"},jt={class:"modal-title"},Pt={class:"modal-body"},Tt={class:"row"},Lt={class:"col-lg-12 text-center"},Ot={class:"form-group"},It={class:"form-group"},Nt=["placeholder"],Bt=["placeholder"],Rt={class:"form-group"},Ft=["placeholder"];function Dt(e,t,n,l,a,o){const b=w("StripeElements"),p=w("loading_button");return d(),f("div",Ct,[i("div",St,[i("div",Ut,[i("div",zt,[i("h5",jt,h(e.lang.pay_with_stripe),1),t[5]||(t[5]=i("button",{type:"button",class:"close modal_close","data-bs-dismiss":"modal","aria-label":"Close"},[i("span",{"aria-hidden":"true"},"×")],-1))]),i("div",Pt,[i("div",Tt,[i("div",Lt,[i("div",Ot,[i("div",It,[T(i("input",{type:"text","onUpdate:modelValue":t[0]||(t[0]=g=>a.stripe_form.name=g),class:"form-control",placeholder:e.lang.name},null,8,Nt),[[re,a.stripe_form.name]])]),T(i("input",{type:"email","onUpdate:modelValue":t[1]||(t[1]=g=>a.stripe_form.email=g),class:"form-control",placeholder:e.lang.email},null,8,Bt),[[re,a.stripe_form.email]])]),i("div",Rt,[T(i("input",{type:"tel","onUpdate:modelValue":t[2]||(t[2]=g=>a.stripe_form.phone=g),class:"form-control",placeholder:e.lang.phone},null,8,Ft),[[re,a.stripe_form.phone]])]),x(b,{ref:"stripe_ref",pk:e.settings.stripe_key,locale:"auto",onToken:o.tokenCreated,onLoading:t[3]||(t[3]=g=>a.stripe_form.loading=g)},null,8,["pk","onToken"]),T(i("button",{onClick:t[4]||(t[4]=(...g)=>o.submit&&o.submit(...g)),class:"btn btn-primary"},h(e.lang.pay)+" "+h(e.priceFormat(n.amount)),513),[[Z,!a.loading]]),a.loading?(d(),_(p,{key:0,class_name:"btn btn-primary"})):m("",!0)])])])])])])}const Mt=H(Et,[["render",Dt]]),$t={name:"apple_pay",components:{},props:["trx_id","code","amount"],data(){return{}},mounted(){const e=document.createElement("script");e.src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js",document.body.appendChild(e),this.onApplePayButtonClicked()},methods:{onApplePayButtonClicked(){const e={countryCode:"US",currencyCode:"USD",merchantCapabilities:["supports3DS"],supportedNetworks:["visa","masterCard","amex","discover"],total:{label:"Demo (Card is not charged)",type:"final",amount:"1.99"}},t=new ApplePaySession(3,e);if(!t)return confirm("Apple Session Cannot be Created");t.onvalidatemerchant=async n=>{const l=await validateMerchant();t.completeMerchantValidation(l)},t.onpaymentmethodselected=n=>{const l={};t.completePaymentMethodSelection(l)},t.onshippingmethodselected=n=>{const l={};t.completeShippingMethodSelection(l)},t.onshippingcontactselected=n=>{const l={};t.completeShippingContactSelection(l)},t.onpaymentauthorized=n=>{const l={status:ApplePaySession.STATUS_SUCCESS};t.completePayment(l)},t.oncouponcodechanged=n=>{const l=calculateNewTotal(n.couponCode),a=calculateNewLineItems(n.couponCode),o=calculateNewShippingMethods(n.couponCode),b=calculateErrors(n.couponCode);t.completeCouponCodeChange({newTotal:l,newLineItems:a,newShippingMethods:o,errors:b})},t.oncancel=n=>{},t.begin()}}},Vt={class:"apple-pay-button"};function Gt(e,t,n,l,a,o){return d(),f("div",Vt)}const Yt=H($t,[["render",Gt]]),qt={props:["trx_id","code"],data(){return{is_disable:!1}},methods:{async payWithRazorpay(){if(this.is_disable!=!0){this.is_disable=!0;try{const{data:e}=await axios.get(this.getUrl("razorpay/redirect"),{params:{trx_id:this.trx_id,code:this.code}});if(e.error){this.$toast.error(e.error),this.is_disable=!1;return}const t={key:e.razorpay_key,amount:e.amount,currency:e.currency,name:e.name,description:e.description,order_id:e.order_id,handler:l=>{axios.post(this.getUrl("razorpay/payment-verify"),l).then(()=>{this.code?this.$router.push({name:"get.invoice",params:{orderCode:this.code}}):this.$router.push({name:"invoice.list",params:{trx_id:this.trx_id}})}).catch(()=>{this.$toast.error("Payment verification failed!"),this.is_disable=!1})},theme:{color:"#3399cc"}};new Razorpay(t).open(),this.is_disable=!1}catch{this.$toast.error("Failed to initiate Razorpay!"),this.is_disable=!1}}}}},xt=["disabled"];function Ht(e,t,n,l,a,o){return d(),f("div",null,[i("button",{onClick:t[0]||(t[0]=(...b)=>o.payWithRazorpay&&o.payWithRazorpay(...b)),type:"button",class:"btn btn-primary w-100",disabled:a.is_disable},h(e.lang.pay_now),9,xt)])}const Wt=H(qt,[["render",Ht]]),Kt={components:{Shimmer:fe,OrderProgress:be,PaymentDetails:ke,payment_method:Ze,GdPrPage:we,offline_method:xe,midtrans:Ae,flutter_wave:Ee,google_pay:Ce,apple_pay:Yt,kkiapay:Se,paypal:Ue,paystack:ze,stripe:Mt,razorpay:Wt},data(){return{offline_methods:[],indian_currency:{},check_cod:!1,razor_laod:!1,ssl:{name:null,email:null,phone:null},razor_form:{name:null,email:null,phone:null,description:null},trx_id:"",offline_method:{id:"",name:"",image:"",instructions:""},jazz_data:[],jazz_url:"",wallet_loading:!1,code:typeof this.$route.params.code<"u"?this.$route.params.code:"",loading:!1,offline_modal:!1,showStripeModal:!1,mid_trans_token:"",xof:"",agreement:"",offline_method_file:""}},mounted(){this.takeOrders()},watch:{carts(e,t){this.$router.go(-1)}},computed:{carts(){return this.$store.getters.getCarts},shimmer(){return this.$store.state.module.shimmer}},methods:{takeOrders(){this.carts;let e=this.getUrl("user/payment-order?code="+this.code);this.resetForm(),axios.get(e).then(t=>{if(this.$store.commit("setShimmer",0),t.data.error)this.$toast.error(t.data.error,this.lang.Error+" !!");else{this.$store.commit("setLoginRedirection","");let n=t.data.orders,l=t.data.coupons;if(this.indian_currency=t.data.indian_currency,this.xof=t.data.xof,this.offline_methods=t.data.offline_methods,this.jazz_data=t.data.jazz_data,this.jazz_url=t.data.jazz_url,this.mid_trans_token=t.data.mid_trans_token,t.data.check_cod&&(this.check_cod=t.data.check_cod),n){for(let a=0;a<n.length;a++){if(this.payment_form.sub_total+=parseFloat(n[a].sub_total),this.payment_form.discount_offer+=parseFloat(n[a].discount),this.payment_form.shipping_tax+=parseFloat(n[a].shipping_cost),this.payment_form.tax+=parseFloat(n[a].total_tax),this.settings.coupon_system==1){this.coupon_list=l;for(let o=0;o<l.length;o++)this.payment_form.coupon_discount+=parseFloat(l[o].discount)}this.trx_id=n[a].trx_id}this.settings.tax_type=="after_tax"&&this.settings.vat_and_tax_type=="order_base"?(this.payment_form.total=parseFloat(parseFloat(this.payment_form.sub_total)+parseFloat(this.payment_form.shipping_tax)-(parseFloat(this.payment_form.discount_offer)+parseFloat(this.payment_form.coupon_discount))),this.payment_form.total+=parseFloat(this.payment_form.tax),this.payment_form.total<0&&(this.payment_form.total=0)):(this.payment_form.total=parseFloat(parseFloat(this.payment_form.sub_total)+parseFloat(this.payment_form.tax)+parseFloat(this.payment_form.shipping_tax)-(parseFloat(this.payment_form.discount_offer)+parseFloat(this.payment_form.coupon_discount))),this.payment_form.total<0&&(this.payment_form.total=0))}this.trx_id||(je("warning",this.lang.something_went_wrong_try_chooing_address),this.$router.push({name:"checkout"}))}})},integrateRazorPay(){if(this.razorPayRemove(),this.settings.is_razorpay_activated==1&&this.indian_currency){alert(!0);let e=document.createElement("script");e.setAttribute("type","text/javascript"),e.setAttribute("language","javascript"),e.setAttribute("data-key",this.settings.razor_key),e.setAttribute("data-amount",this.round(this.payment_form.total*100*this.indian_currency.exchange_rate)),e.setAttribute("data-name",this.settings.system_name),e.setAttribute("data-description","Razorpay"),e.setAttribute("data-image",this.settings.dark_logo),e.setAttribute("data-prefill.name",""),e.setAttribute("data-prefill.email",""),e.setAttribute("data-prefill.address",""),e.setAttribute("data-theme.color",this.settings.menu_background_color),e.setAttribute("src",this.getUrl("public/frontend/js/razor_pay_checkout.js")),this.$refs.razor_pay.insertAdjacentElement("afterend",e)}},razorPayRemove(){var e=document.querySelectorAll(".razorpay-payment-button");for(let t=0;t<e.length;t++)e[t].style.display="none";this.offline_method.name="",this.offline_method.image="",this.offline_method.instructions=""},offlineCheck(e){this.razorPayRemove(),this.offline_method.id=e.id,this.offline_method.name=e.name,this.offline_method.image=e.image,this.offline_method.instructions=e.instructions},payment(e){if(!this.$refs.payment_agreement.checkAgreements())return this.$toast.info(this.lang.accept_terms,this.lang.Error+" !!");let t="";if(e=="wallet"?(this.wallet_loading=!0,t=e):t=this.payment_form.payment_type,!t)return this.$toast.warning(this.lang.please_choose_a_payment_method,this.lang.Warning+" !!"),!1;let n={id:this.offline_method.id,file:this.offline_method_file,payment_type:t,trx_id:this.trx_id,is_buy_now:this.$route.params.is_type?this.$route.params.is_type:0},l=this.getUrl("user/complete-order?code="+this.code);if(t=="cash_on_delivery"||t=="pay_later"||this.offline_method.id||t=="wallet"){e!="wallet"&&(this.loading=!0);const a=this.$objectToFormData(n);axios.post(l,a).then(o=>{if(this.wallet_loading=!1,this.loading=!1,o.data.error)this.$toast.error(o.data.error,this.lang.Error+" !!");else{console.log(o.data);const b=document.querySelector('[id="offline_payment_close"]');b&&b.click();let p=document.getElementById("upload-image");if(p&&(p.innerHTML=""),this.code){this.$router.push({name:"get.invoice",params:{orderCode:this.code}});return}this.$router.push({name:"invoice.list",params:{trx_id:this.trx_id}})}}).catch(o=>{this.loading=!1})}else{if(t=="paystack")return this.$refs.paystack.payStack();if(t=="stripe")return window.location.href=this.getUrl("stripe/redirect?trx_id="+this.trx_id+"&code="+this.$route.params.code);if(t=="paytm")return window.location.href=this.getUrl("user/payment/paytmRedirect?trx_id="+this.trx_id+"&code="+this.$route.params.code+"&payment_type=paytm");if(t=="ssl_commerze")return window.location.href=this.getUrl("get/ssl-response?payment_type=ssl_commerze&code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="mollie")return window.location.href=this.getUrl("mollie/payment?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="telr")return window.location.href=this.getUrl("telr/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="mercadopago")return window.location.href=this.getUrl("mercadopago/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="amarpay")return window.location.href=this.getUrl("amarpay/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="bkash")return window.location.href=this.getUrl("bkash/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="nagad")return window.location.href=this.getUrl("nagad/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="skrill")return window.location.href=this.getUrl("skrill/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="hitpay")return window.location.href=this.getUrl("hitpay/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="dpo")return window.location.href=this.getUrl("dpo/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id);if(t=="mpesa")return window.location.href=this.getUrl("mpesa/redirect?code="+this.$route.params.code+"&trx_id="+this.trx_id)}},checkCurrency(e){return this.$store.getters.getCurrencies.findIndex(l=>l.code==e)>-1}}},Jt={class:"breadcrumb-section bg-color py-10"},Qt={class:"container"},Xt={class:"row"},Zt={class:"col-12"},en={class:"breadcrumb-area"},tn={class:"list"},nn={class:"cart-section pt-25 pb-100"},an={class:"container"},rn={class:"row"},on={key:0,class:"col-xl-9 col-lg-8"},sn={class:"cart-form"},ln={class:"cart-header"},dn={class:"store-title"},mn={class:"payment-wrapper mt-15"},pn={class:"input-checkbox paymentItem"},cn=["id","onChange"],un=["for"],yn=["src","alt"],hn={key:1,class:"row text-center"},_n={class:"col-lg-12"},fn={class:"separator mb-3"},gn={class:"bg-white px-3"},vn={class:"opacity-60"},bn={class:"col-lg-12 mb-5"},kn={key:1,class:"col-xl-9 col-lg-8"},wn={class:"col-xl-3 col-lg-4"},An={class:"cart-order"},En={class:"cart-header"},Cn={class:"store-title"},Sn=["action"],Un=["value"],zn=["value"],jn=["value"],Pn=["value"],Tn={ref:"razor_pay"},Ln={class:"cart-btns"},On={key:2,href:"javascript:void(0)",class:"btn btn-primary disable_btn"},In={key:10,href:"#",class:"btn btn-primary w-100","data-bs-toggle":"modal","data-bs-target":"#paystack_modal"},Nn=["action"],Bn=["name","value"],Rn={class:"modal fade",id:"paystack_modal",tabindex:"-1","aria-labelledby":"paystack_modal","aria-hidden":"true"},Fn={class:"modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable"},Dn={class:"modal-content"},Mn={class:"modal-header"},$n={class:"modal-title"};function Vn(e,t,n,l,a,o){const b=w("OrderProgress"),p=w("payment_method"),g=w("loading_button"),N=w("GdPrPage"),A=w("Shimmer"),z=w("PaymentDetails"),j=w("offline_method"),W=w("razorpay"),B=w("midtrans"),D=w("flutter_wave"),C=w("google_pay"),K=w("kkiapay"),M=w("paypal"),O=w("paystack");return d(),f(Q,null,[i("section",Jt,[i("div",Qt,[i("div",Xt,[i("div",Zt,[i("div",en,[i("ul",tn,[i("li",{onClick:t[0]||(t[0]=u=>e.globNavigate("/cart")),class:"linked"},h(e.lang.view_cart),1),i("li",{onClick:t[1]||(t[1]=u=>e.globNavigate("/checkout")),class:"linked"},h(e.lang.check_out),1),i("li",null,h(e.lang.confirm_order),1)])])])])])]),i("section",nn,[i("div",an,[x(b),i("div",rn,[e.lengthCounter(e.settings)>0?(d(),f("div",on,[i("div",sn,[i("div",ln,[i("h4",dn,h(e.lang.payment_method),1)]),i("div",mn,[e.settings.is_paypal_activated==1&&e.settings.paypal_key?(d(),_(p,{key:0,value:"paypal",label:e.lang.pay_with_payPal,image:e.getUrl("public/images/payment-method/paypal.svg")},null,8,["label","image"])):m("",!0),e.settings.is_stripe_activated==1?(d(),_(p,{key:1,value:"stripe",label:e.lang.pay_with_stripe,image:e.getUrl("public/images/payment-method/stripe.svg")},null,8,["label","image"])):m("",!0),e.settings.is_sslcommerz_activated==1&&o.checkCurrency("BDT")?(d(),_(p,{key:2,value:"ssl_commerze",label:e.lang.pay_with_sSLCOMMERZE,image:e.getUrl("public/images/payment-method/sslcommerze.svg")},null,8,["label","image"])):m("",!0),e.settings.is_paytm_activated==1&&o.checkCurrency("INR")?(d(),_(p,{key:3,value:"ssl_commerze",label:e.lang.pay_with_paytm,image:e.getUrl("public/images/payment-method/paytm.svg")},null,8,["label","image"])):m("",!0),e.settings.is_razorpay_activated==1&&o.checkCurrency("INR")?(d(),_(p,{key:4,value:"razor_pay",label:e.lang.pay_with_razorpay,image:e.getUrl("public/images/payment-method/razorpay.svg")},null,8,["label","image"])):m("",!0),e.settings.is_jazz_cash_activated==1&&o.checkCurrency("PKR")?(d(),_(p,{key:5,value:"jazz_cash",label:e.lang.pay_with_jazzCash,image:e.getUrl("public/images/payment-method/jazzCash.svg")},null,8,["label","image"])):m("",!0),e.settings.is_mollie_activated==1?(d(),_(p,{key:6,value:"mollie",label:e.lang.pay_with_mollie,image:e.getUrl("public/images/payment-method/mollie.svg")},null,8,["label","image"])):m("",!0),e.settings.is_paystack_activated==1&&o.checkCurrency("NGN")?(d(),_(p,{key:7,value:"paystack",label:e.lang.pay_with_paystack,image:e.getUrl("public/images/payment-method/paystack.svg")},null,8,["label","image"])):m("",!0),e.settings.is_flutterwave_activated==1&&o.checkCurrency("NGN")?(d(),_(p,{key:8,value:"flutter_wave",label:e.lang.pay_with_flutter,image:e.getUrl("public/images/payment-method/fw.svg")},null,8,["label","image"])):m("",!0),e.settings.is_mercado_pago_activated==1&&o.checkCurrency("MXN")?(d(),_(p,{key:9,value:"mercadopago",label:e.lang.pay_with_mercadopago,image:e.getUrl("public/images/payment-method/mercado-pago.svg")},null,8,["label","image"])):m("",!0),e.settings.is_mid_trans_activated==1&&o.checkCurrency("IDR")?(d(),_(p,{key:10,value:"mid_trans",label:e.lang.pay_with_mid_trans,image:e.getUrl("public/images/payment-method/midtrans.svg")},null,8,["label","image"])):m("",!0),e.settings.is_telr_activated?(d(),_(p,{key:11,value:"telr",label:e.lang.pay_with_telr,image:e.getUrl("public/images/payment-method/telr.svg")},null,8,["label","image"])):m("",!0),e.settings.is_google_pay_activated?(d(),_(p,{key:12,value:"google_pay",label:e.lang.pay_with_google_pay,image:e.getUrl("public/images/payment-method/google_pay.svg")},null,8,["label","image"])):m("",!0),e.settings.is_bkash_activated&&o.checkCurrency("BDT")?(d(),_(p,{key:13,value:"bkash",label:e.lang.pay_with_bkash,image:e.getUrl("public/images/payment-method/bKash.svg")},null,8,["label","image"])):m("",!0),e.settings.is_nagad_activated&&o.checkCurrency("BDT")?(d(),_(p,{key:14,value:"nagad",label:e.lang.pay_with_nagad,image:e.getUrl("public/images/payment-method/nagad.svg")},null,8,["label","image"])):m("",!0),e.settings.is_amarpay_activated&&o.checkCurrency("BDT")?(d(),_(p,{key:15,value:"amarpay",label:e.lang.pay_with_amarpay,image:e.getUrl("public/images/payment-method/amarpay.svg")},null,8,["label","image"])):m("",!0),e.settings.is_skrill_activated?(d(),_(p,{key:16,value:"skrill",label:e.lang.pay_with_skrill,image:e.getUrl("public/images/payment-method/skrill.svg")},null,8,["label","image"])):m("",!0),e.settings.is_iyzico_activated?(d(),_(p,{key:17,value:"iyzico",label:e.lang.pay_with_iyzico,image:e.getUrl("public/images/payment-method/iyzico.svg")},null,8,["label","image"])):m("",!0),e.settings.is_kkiapay_activated?(d(),_(p,{key:18,value:"kkiapay",label:e.lang.pay_with_kkiapay,image:e.getUrl("public/images/payment-method/kkiapay.svg")},null,8,["label","image"])):m("",!0),!a.code&&e.settings.pay_later_system==1&&e.authUser?(d(),_(p,{key:19,value:"pay_later",label:e.lang.pay_later,image:e.getUrl("public/images/payment-method/paylater.svg")},null,8,["label","image"])):m("",!0),e.payment_form.total>0&&!a.code&&!a.check_cod?(d(),_(p,{key:20,value:"cash_on_delivery",label:e.lang.cash_on_delivery,image:e.getUrl("public/images/payment-method/cash.svg")},null,8,["label","image"])):m("",!0),e.settings.is_hitpay_activated&&e.addons.includes("hitpay_payment_gateway")?(d(),_(p,{key:21,value:"hitpay",label:e.lang.pay_with_hitpay,image:e.getUrl("public/images/payment-method/hitpay.svg")},null,8,["label","image"])):m("",!0),e.settings.is_hitpay_activated&&e.addons.includes("hitpay_payment_gateway")?(d(),_(p,{key:22,value:"hitpay",label:e.lang.pay_with_hitpay,image:e.getUrl("public/images/payment-method/hitpay.svg")},null,8,["label","image"])):m("",!0),e.settings.is_dpo_activated?(d(),_(p,{key:23,value:"dpo",label:e.lang.pay_with_dpo,image:e.getUrl("public/images/payment-method/dpo.svg")},null,8,["label","image"])):m("",!0),e.settings.is_mpesa_activated&&e.addons.includes("ramdhani")?(d(),_(p,{key:24,value:"mpesa",label:e.lang.pay_with_mpesa,image:e.getUrl("public/images/payment-method/mpesa_logo.png")},null,8,["label","image"])):m("",!0)]),!a.code&&e.addons.includes("offline_payment")?(d(),f(Q,{key:0},[t[18]||(t[18]=i("div",{class:"subtitle"},"OR Select",-1)),(d(!0),f(Q,null,oe(a.offline_methods,(u,P)=>(d(),f("div",{class:"delivery-btn",key:P},[i("div",pn,[T(i("input",{type:"radio",id:"offline"+u.id,onChange:R=>o.offlineCheck(u),value:"offline_method",name:"radio","onUpdate:modelValue":t[2]||(t[2]=R=>e.payment_form.payment_type=R)},null,40,cn),[[ue,e.payment_form.payment_type]]),i("label",{class:"h-auto p-4 d-inline-flex gap-3",for:"offline"+u.id},[i("img",{loading:"lazy",src:u.image,alt:u.name,class:"img-fluid"},null,8,yn),ve(" "+h(u.name),1)],8,un)])]))),128))],64)):m("",!0),e.payment_form.total>0&&e.authUser&&e.authUser.balance>=e.payment_form.total&&e.settings.wallet_system==1?(d(),f("div",hn,[i("div",_n,[i("div",fn,[i("span",gn,[i("span",vn,h(e.lang.or),1)])])]),i("div",bn,[i("p",null,h(e.lang.your_wallet_balance)+" : "+h(e.priceFormat(e.authUser.balance)),1),a.wallet_loading?m("",!0):(d(),f("a",{key:0,href:"javascript:void(0)",onClick:t[3]||(t[3]=u=>o.payment("wallet")),class:"btn btn-primary"},h(e.lang.pay_with_wallet),1)),a.wallet_loading?(d(),_(g,{key:1,class_name:"btn btn-primary"})):m("",!0)])])):m("",!0)]),x(N,{ref:"payment_agreement",agreements:e.settings.payment_agreement,class:ge({"mt-5 pt-5":!(e.payment_form.total>0&&e.authUser&&e.authUser.balance>=e.payment_form.total&&e.settings.wallet_system==1)})},null,8,["agreements","class"])])):o.shimmer?(d(),f("div",kn,[(d(),f(Q,null,oe(3,(u,P)=>x(A,{class:"mb-3",height:200,key:P})),64))])):m("",!0),i("div",wn,[i("div",An,[i("div",En,[i("h4",Cn,h(e.lang.price_details),1)]),i("form",{action:e.authUser?e.getUrl("user/complete-order?code="+a.code):e.getUrl("user/complete-order?code="+a.code+"&guest=1"),method:"post"},[i("input",{type:"hidden",name:"_token",value:e.token},null,8,Un),i("input",{type:"hidden",name:"trx_id",value:a.trx_id},null,8,zn),i("input",{type:"hidden",name:"payment_type",value:e.payment_form.payment_type},null,8,jn),i("input",{type:"hidden",name:"amount",value:e.payment_form.total},null,8,Pn),i("div",Tn,null,512),x(z,{sub_total:e.payment_form.sub_total,tax:e.payment_form.tax,discount_offer:e.payment_form.discount_offer,shipping_tax:e.payment_form.shipping_tax,coupon_discount:e.payment_form.coupon_discount,total:e.payment_form.total},null,8,["sub_total","tax","discount_offer","shipping_tax","coupon_discount","total"])],8,Sn),i("div",Ln,[a.loading&&(e.payment_form.payment_type=="cash_on_delivery"||e.payment_form.payment_type=="pay_later")?(d(),_(g,{key:0,class_name:"btn btn-primary w-100"})):m("",!0),e.payment_form.payment_type=="stripe"?(d(),f("a",{key:1,onClick:t[4]||(t[4]=(...u)=>o.payment&&o.payment(...u)),href:"javascript:void(0)",class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type?m("",!0):(d(),f("a",On,h(e.lang.pay_now),1)),e.payment_form.payment_type=="paytm"?(d(),f("a",{key:3,onClick:t[5]||(t[5]=(...u)=>o.payment&&o.payment(...u)),href:"javascript:void(0)",class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="ssl_commerze"?(d(),f("a",{key:4,href:"javascript:void(0)",onClick:t[6]||(t[6]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="cash_on_delivery"||e.payment_form.payment_type=="pay_later"?T((d(),f("a",{key:5,href:"javascript:void(0)",onClick:t[7]||(t[7]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.confirm),513)),[[Z,!a.loading]]):m("",!0),a.offline_methods.length>0&&!a.code&&e.addons.includes("offline_payment")?(d(),_(j,{key:6,trx_id:a.trx_id,code:a.code,amount:e.payment_form.total,offline_method:a.offline_method,loading:a.loading},null,8,["trx_id","code","amount","offline_method","loading"])):m("",!0),e.payment_form.payment_type=="razor_pay"?(d(),_(W,{key:7,trx_id:a.trx_id,code:a.code},null,8,["trx_id","code"])):m("",!0),e.payment_form.payment_type=="mollie"?(d(),f("a",{key:8,href:"javascript:void(0)",onClick:t[8]||(t[8]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="telr"?(d(),f("a",{key:9,href:"javascript:void(0)",onClick:t[9]||(t[9]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="paystack"?(d(),f("a",In,h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="mid_trans"?(d(),_(B,{key:11,amount:e.payment_form.total,mid_token:a.mid_trans_token,trx_id:a.trx_id,code:a.code},null,8,["amount","mid_token","trx_id","code"])):m("",!0),e.settings.is_flutterwave_activated==1?(d(),_(D,{key:12,trx_id:a.trx_id,code:a.code,amount:e.payment_form.total,type:e.payment_form.payment_type,ref:"flutter_wave"},null,8,["trx_id","code","amount","type"])):m("",!0),e.payment_form.payment_type=="mercadopago"?(d(),f("a",{key:13,href:"javascript:void(0)",onClick:t[10]||(t[10]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="google_pay"?(d(),_(C,{key:14,trx_id:a.trx_id,code:a.code,amount:e.payment_form.total},null,8,["trx_id","code","amount"])):m("",!0),e.payment_form.payment_type=="amarpay"?(d(),f("a",{key:15,href:"javascript:void(0)",onClick:t[11]||(t[11]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="bkash"?(d(),f("a",{key:16,href:"javascript:void(0)",onClick:t[12]||(t[12]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="nagad"?(d(),f("a",{key:17,href:"javascript:void(0)",onClick:t[13]||(t[13]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="skrill"?(d(),f("a",{key:18,href:"javascript:void(0)",onClick:t[14]||(t[14]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="hitpay"?(d(),f("a",{key:19,href:"javascript:void(0)",onClick:t[15]||(t[15]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.payment_form.payment_type=="dpo"?(d(),f("a",{key:20,href:"javascript:void(0)",onClick:t[16]||(t[16]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),e.settings.is_kkiapay_activated&&e.settings.kkiapay_public_key&&e.payment_form.payment_type=="kkiapay"&&a.xof?(d(),_(K,{key:21,trx_id:a.trx_id,code:a.code,amount:e.payment_form.total,payment_type:e.payment_form.payment_type,xof:a.xof,type:"order"},null,8,["trx_id","code","amount","payment_type","xof"])):m("",!0),e.settings.is_paypal_activated==1&&e.settings.paypal_key&&e.payment_form.payment_type=="paypal"?(d(),_(M,{key:22,trx_id:a.trx_id,code:a.code,amount:e.payment_form.total,payment_type:e.payment_form.payment_type,type:"order"},null,8,["trx_id","code","amount","payment_type"])):m("",!0),e.payment_form.payment_type=="mpesa"?(d(),f("a",{key:23,href:"javascript:void(0)",onClick:t[17]||(t[17]=(...u)=>o.payment&&o.payment(...u)),class:"btn btn-primary w-100"},h(e.lang.pay_now),1)):m("",!0),i("form",{name:"jsform",action:a.jazz_url,method:"get"},[(d(!0),f(Q,null,oe(a.jazz_data,(u,P)=>(d(),f("input",{key:P,type:"hidden",name:P,value:u},null,8,Bn))),128)),e.payment_form.payment_type=="jazz_cash"?T((d(),f("button",{key:0,type:"submit",class:"btn btn-primary w-100"},h(e.lang.pay_now),513)),[[Z,!a.loading]]):m("",!0)],8,Nn)])])])])]),i("div",Rn,[i("div",Fn,[i("div",Dn,[i("div",Mn,[i("h5",$n,h(e.lang.pay_with_paystack),1),t[19]||(t[19]=i("button",{type:"button",class:"close modal_close","data-bs-dismiss":"modal","aria-label":"Close"},[i("span",{"aria-hidden":"true"},"×")],-1))]),e.settings.is_paystack_activated==1?(d(),_(O,{key:0,trx_id:a.trx_id,paystack_key:e.settings.paystack_pk,ngn_exchange_rate:e.settings.ngn_exchange_rate,code:a.code,amount:e.payment_form.total,type:e.payment_form.payment_type},null,8,["trx_id","paystack_key","ngn_exchange_rate","code","amount","type"])):m("",!0)])])])])],64)}const Kn=H(Kt,[["render",Vn]]);export{Kn as default};
