var D=Object.defineProperty;var V=(t,i,n)=>i in t?D(t,i,{enumerable:!0,configurable:!0,writable:!0,value:n}):t[i]=n;var b=(t,i,n)=>V(t,typeof i!="symbol"?i+"":i,n);const a=document.getElementById("sidebar");let w=document.querySelector(".main-content");const H=document.querySelectorAll(".nav > ul > .slide.has-sub"),U=document.querySelectorAll(".nav > ul > .slide.has-sub > a"),F=document.querySelectorAll(".nav > ul > .slide.has-sub .slide.has-sub > a");class ${constructor(i,n){b(this,"instance",null);b(this,"reference",null);b(this,"popperTarget",null);this.init(i,n)}init(i,n){this.reference=i,this.popperTarget=n,this.instance=Popper.createPopper(this.reference,this.popperTarget,{placement:"bottom",strategy:"relative",resize:!0,modifiers:[{name:"computeStyles",options:{adaptive:!1}}]}),document.addEventListener("click",o=>this.clicker(o,this.popperTarget,this.reference),!1);const l=new ResizeObserver(()=>{this.instance.update()});l.observe(this.popperTarget),l.observe(this.reference)}clicker(i,n,l){a.classList.contains("collapsed")&&!n.contains(i.target)&&!l.contains(i.target)&&this.hide()}hide(){}}class j{constructor(){b(this,"subMenuPoppers",[]);this.init()}init(){H.forEach(i=>{this.subMenuPoppers.push(new $(i,i.lastElementChild)),this.closePoppers()})}togglePopper(i){window.getComputedStyle(i).visibility==="hidden"&&window.getComputedStyle(i).visibility===void 0?i.style.visibility="visible":i.style.visibility="hidden"}updatePoppers(){this.subMenuPoppers.forEach(i=>{i.instance.state.elements.popper.style.display="none",i.instance.update()})}closePoppers(){this.subMenuPoppers.forEach(i=>{i.hide()})}}const x=(t,i=300)=>{const{parentElement:n}=t;n.classList.remove("open"),t.style.transitionProperty="height, margin, padding",t.style.transitionDuration=`${i}ms`,t.style.boxSizing="border-box",t.style.height=`${t.offsetHeight}px`,t.offsetHeight,t.style.overflow="hidden",t.style.height=0,t.style.paddingTop=0,t.style.paddingBottom=0,t.style.marginTop=0,t.style.marginBottom=0,t.style.borderTop=0,window.setTimeout(()=>{t.style.display="none",t.style.removeProperty("height"),t.style.removeProperty("padding-top"),t.style.removeProperty("padding-bottom"),t.style.removeProperty("margin-top"),t.style.removeProperty("margin-bottom"),t.style.removeProperty("overflow"),t.style.removeProperty("transition-duration"),t.style.removeProperty("transition-property"),t.style.removeProperty("border-top")},i);const l=t.closest("li");if(l){const o=l.querySelector("ul");o&&o.classList.remove("force-left")}},N=(t,i=300)=>{const{parentElement:n}=t;n.classList.add("open"),t.style.removeProperty("display");let{display:l}=window.getComputedStyle(t);l==="none"&&(l="block"),t.style.display=l;const o=t.offsetHeight;t.style.overflow="hidden",t.style.height=0,t.style.paddingTop=0,t.style.paddingBottom=0,t.style.marginTop=0,t.style.marginBottom=0,t.style.borderTop=0,t.offsetHeight,t.style.boxSizing="border-box",t.style.transitionProperty="height, margin, padding",t.style.transitionDuration=`${i}ms`,t.style.height=`${o}px`,t.style.removeProperty("padding-top"),t.style.removeProperty("padding-bottom"),t.style.removeProperty("margin-top"),t.style.removeProperty("margin-bottom"),t.style.removeProperty("border-top"),window.setTimeout(()=>{t.style.removeProperty("height"),t.style.removeProperty("overflow"),t.style.removeProperty("transition-property"),t.style.removeProperty("transition-duration")},i);let s=document.documentElement;const r=t.closest("li");var d=r.getBoundingClientRect(),m=t.getBoundingClientRect().width,c=d.right+m,y=d.left-m;s.getAttribute("dir")=="rtl"?y<0||r.closest("ul").classList.contains("force-left")&&c<window.innerWidth?t.classList.add("force-left"):t.classList.remove("force-left"):c>window.innerWidth||r.closest("ul").classList.contains("force-left")&&y>0?t.classList.add("force-left"):(y<0,t.classList.remove("force-left"))},T=(t,i=300)=>{let n=document.querySelector("html");if(!(n.getAttribute("data-nav-style")==="menu-hover"&&n.getAttribute("data-toggled")==="menu-hover-closed"&&window.innerWidth>=992||n.getAttribute("data-nav-style")==="icon-hover"&&n.getAttribute("data-toggled")==="icon-hover-closed"&&window.innerWidth>=992)&&t&&t.nodeType!=3)return window.getComputedStyle(t).display==="none"?N(t,i):x(t,i)};new j;const G=document.querySelectorAll(".slide.has-sub.open");G.forEach(t=>{t.lastElementChild.style.display="block"});U.forEach(t=>{t.addEventListener("click",()=>{let i=document.querySelector("html");if(i.getAttribute("data-nav-style")!="menu-hover"&&i.getAttribute("data-nav-style")!="icon-hover"||window.innerWidth<992||!i.getAttribute("data-toggled")&&i.getAttribute("data-nav-layout")!="horizontal"){const n=t.closest(".nav.sub-open");n&&n.querySelectorAll(":scope > ul > .slide.has-sub > a").forEach(l=>{(l.nextElementSibling.style.display==="block"||window.getComputedStyle(l.nextElementSibling).display==="block")&&x(l.nextElementSibling)}),T(t.nextElementSibling)}})});F.forEach(t=>{let i=document.querySelector("html");t.addEventListener("click",()=>{if(i.getAttribute("data-nav-style")!="menu-hover"&&i.getAttribute("data-nav-style")!="icon-hover"||window.innerWidth<992||!i.getAttribute("data-toggled")&&i.getAttribute("data-nav-layout")!="horizontal"){const n=t.closest(".slide-menu");n&&n.querySelectorAll(":scope .slide.has-sub > a").forEach(l=>{var o;l.nextElementSibling&&((o=l.nextElementSibling)==null?void 0:o.style.display)==="block"&&x(l.nextElementSibling)}),T(t.nextElementSibling)}})});let I,h;(()=>{let t=document.querySelector("html");I=document.querySelector(".sidemenu-toggle"),I.addEventListener("click",A);let i=document.querySelector(".main-content");window.innerWidth<=992?i.addEventListener("click",L):i.removeEventListener("click",L),h=[window.innerWidth],S(),t.getAttribute("data-nav-layout")==="horizontal"&&window.innerWidth>=992?(v(),i.addEventListener("click",v)):i.removeEventListener("click",v),window.addEventListener("resize",B),J(),!localStorage.getItem("valexlayout")&&!localStorage.getItem("valexnavstyles")&&!localStorage.getItem("valexverticalstyles")&&!document.querySelector(".landing-body")&&document.querySelector("html").getAttribute("data-nav-layout")!=="horizontal"&&!t.getAttribute("data-vertical-style")&&!t.getAttribute("data-nav-style")&&z();function n(){var o;document.querySelector("html").setAttribute("dir","rtl"),(o=document.querySelector("#style"))==null||o.setAttribute("href","http://127.0.0.1:8000/build/assets/libs/bootstrap/css/bootstrap.rtl.min.css"),localStorage.getItem("valexrtl")&&(document.querySelector("#switcher-rtl").checked=!0)}t.getAttribute("dir")==="rtl"&&n(),t.getAttribute("data-nav-layout")==="horizontal"&&document.querySelector(".landing-body"),A(),t.getAttribute("data-vertical-style")==="detached"&&t.removeAttribute("data-toggled"),(t.getAttribute("data-nav-style")==="menu-hover"||t.getAttribute("data-nav-style")==="icon-hover")&&window.innerWidth>=992&&v(),window.innerWidth<992&&t.setAttribute("data-toggled","close")})();function B(){let t=document.querySelector("html"),i=document.querySelector(".main-content");h.push(window.innerWidth),h.length>2&&h.shift(),h.length>1&&(h[h.length-1]<992&&h[h.length-2]>=992&&(i.addEventListener("click",L),S(),A(),i.removeEventListener("click",v)),h[h.length-1]>=992&&h[h.length-2]<992&&(i.removeEventListener("click",L),A(),t.getAttribute("data-nav-layout")==="horizontal"?(v(),i.addEventListener("click",v)):i.removeEventListener("click",v),document.documentElement.getAttribute("data-vertical-style")=="doublemenu"?document.querySelector(".double-menu-active")?t.setAttribute("data-toggled","double-menu-open"):t.setAttribute("data-toggled","double-menu-close"):t.removeAttribute("data-toggled"))),_()}function L(){document.querySelector("html").setAttribute("data-toggled","close"),document.querySelector("#responsive-overlay").classList.remove("active")}function A(){let t=document.querySelector("html"),i=t.getAttribute("data-nav-layout");if(window.innerWidth>=992){if(i==="vertical"){switch(a.removeEventListener("mouseenter",g),a.removeEventListener("mouseleave",p),a.removeEventListener("click",q),w.removeEventListener("click",k),document.querySelectorAll(".main-menu li > .side-menu__item").forEach(s=>s.removeEventListener("click",C)),t.getAttribute("data-vertical-style")){case"closed":t.removeAttribute("data-nav-style"),t.getAttribute("data-toggled")==="close-menu-close"?t.removeAttribute("data-toggled"):t.setAttribute("data-toggled","close-menu-close");break;case"overlay":t.removeAttribute("data-nav-style"),t.getAttribute("data-toggled")==="icon-overlay-close"?(t.removeAttribute("data-toggled","icon-overlay-close"),a.removeEventListener("mouseenter",g),a.removeEventListener("mouseleave",p)):window.innerWidth>=992?(localStorage.getItem("valexlayout")||t.setAttribute("data-toggled","icon-overlay-close"),a.addEventListener("mouseenter",g),a.addEventListener("mouseleave",p)):(a.removeEventListener("mouseenter",g),a.removeEventListener("mouseleave",p));break;case"icontext":t.removeAttribute("data-nav-style"),t.getAttribute("data-toggled")==="icon-text-close"?(t.removeAttribute("data-toggled","icon-text-close"),a.removeEventListener("click",q),w.removeEventListener("click",k)):(t.setAttribute("data-toggled","icon-text-close"),window.innerWidth>=992?(a.addEventListener("click",q),w.addEventListener("click",k)):(a.removeEventListener("click",q),w.removeEventListener("click",k)));break;case"doublemenu":if(t.removeAttribute("data-nav-style"),t.getAttribute("data-toggled")==="double-menu-open")t.setAttribute("data-toggled","double-menu-close"),document.querySelector(".slide-menu")&&document.querySelectorAll(".slide-menu").forEach(r=>{r.classList.contains("double-menu-active")&&r.classList.remove("double-menu-active")});else{let s=document.querySelector(".side-menu__item.active");s&&(t.setAttribute("data-toggled","double-menu-open"),s.nextElementSibling?s.nextElementSibling.classList.add("double-menu-active"):document.querySelector("html").setAttribute("data-toggled","double-menu-close"))}Q();break;case"detached":t.getAttribute("data-toggled")==="detached-close"?(t.removeAttribute("data-toggled","detached-close"),a.removeEventListener("mouseenter",g),a.removeEventListener("mouseleave",p)):(t.setAttribute("data-toggled","detached-close"),window.innerWidth>=992?(a.addEventListener("mouseenter",g),a.addEventListener("mouseleave",p)):(a.removeEventListener("mouseenter",g),a.removeEventListener("mouseleave",p)));break;case"default":z(),t.removeAttribute("data-toggled");break}switch(t.getAttribute("data-nav-style")){case"menu-click":t.getAttribute("data-toggled")==="menu-click-closed"?t.removeAttribute("data-toggled"):t.setAttribute("data-toggled","menu-click-closed");break;case"menu-hover":t.getAttribute("data-toggled")==="menu-hover-closed"?(t.removeAttribute("data-toggled"),S()):(t.setAttribute("data-toggled","menu-hover-closed"),v());break;case"icon-click":t.getAttribute("data-toggled")==="icon-click-closed"?t.removeAttribute("data-toggled"):t.setAttribute("data-toggled","icon-click-closed");break;case"icon-hover":t.getAttribute("data-toggled")==="icon-hover-closed"?(t.removeAttribute("data-toggled"),S()):(t.setAttribute("data-toggled","icon-hover-closed"),v());break}}}else if(t.getAttribute("data-toggled")==="close"){t.setAttribute("data-toggled","open");let n=document.createElement("div");n.id="responsive-overlay",setTimeout(()=>{document.querySelector("html").getAttribute("data-toggled")=="open"&&(document.querySelector("#responsive-overlay").classList.add("active"),document.querySelector("#responsive-overlay").addEventListener("click",()=>{document.querySelector("#responsive-overlay").classList.remove("active"),L()})),window.addEventListener("resize",()=>{window.innerWidth>=992&&document.querySelector("#responsive-overlay").classList.remove("active")})},100)}else t.setAttribute("data-toggled","close")}function g(){document.querySelector("html").setAttribute("data-icon-overlay","open")}function p(){document.querySelector("html").removeAttribute("data-icon-overlay")}function q(){document.querySelector("html").setAttribute("data-icon-text","open")}function k(){document.querySelector("html").removeAttribute("data-icon-text")}function z(){let t=document.querySelector("html");t.setAttribute("data-nav-layout","vertical"),t.setAttribute("data-vertical-style","overlay"),t.removeAttribute("data-nav-style",""),A(),S()}function S(){let t=window.location.pathname.split("/")[0];t=location.pathname=="/"?"index":location.pathname.substring(1),t=t.substring(t.lastIndexOf("/")+1),document.querySelectorAll(".side-menu__item").forEach(n=>{if(t==="/"&&(t="index"),n.getAttribute("href")===window.location.href){n.classList.add("active"),n.parentElement.classList.add("active");let l=n.closest("ul");if(n.closest("ul:not(.main-menu)"),l){if(l.classList.add("active"),l.previousElementSibling.classList.add("active"),l.parentElement.classList.add("active"),l.parentElement.classList.contains("has-sub")){let o=l.parentElement.parentElement.parentElement;o.classList.add("open","active"),o.firstElementChild.classList.add("active"),o.children[1].style.display="block",Array.from(o.children[1].children).map(s=>{s.classList.contains("active")&&(s.children[1].style.display="block")})}l.classList.contains("child1")&&N(l),l=l.parentElement.closest("ul"),l&&l.closest("ul:not(.main-menu)")&&l.closest("ul:not(.main-menu)")}}})}function v(){document.querySelectorAll("ul.slide-menu").forEach(i=>{let n=i.closest("ul"),l=i.closest("ul:not(.main-menu)");if(n){let o=n.closest("ul.main-menu");for(;o;)n.classList.add("active"),x(n),n=n.parentElement.closest("ul"),l=n.closest("ul:not(.main-menu)"),l||(o=!1)}})}function J(){let t=document.querySelector(".slide-left"),i=document.querySelector(".slide-right");function n(){let l=document.querySelectorAll(".slide"),o=document.querySelectorAll(".slide-menu");l.forEach((s,r)=>{s.classList.contains("is-expanded")==!0&&s.classList.remove("is-expanded")}),o.forEach((s,r)=>{s.classList.contains("open")==!0&&(s.classList.remove("open"),s.style.display="none")})}_(),t.addEventListener("click",()=>{let l=document.querySelector(".main-menu"),o=document.querySelector(".main-sidebar"),s=Math.ceil(Number(window.getComputedStyle(l).marginLeft.split("px")[0])),r=Math.ceil(Number(window.getComputedStyle(l).marginRight.split("px")[0])),d=o.offsetWidth;l.scrollWidth>o.offsetWidth?document.querySelector("html").getAttribute("dir")!=="rtl"?s<0&&!(Math.abs(s)<d)?(l.style.marginRight=0,l.style.marginLeft=Number(l.style.marginLeft.split("px")[0])+Math.abs(d)+"px",i.classList.remove("d-none")):(s>=0,l.style.marginLeft="0px",t.classList.add("d-none"),i.classList.remove("d-none")):r<0&&!(Math.abs(r)<d)?(l.style.marginLeft=0,l.style.marginRight=Number(l.style.marginRight.split("px")[0])+Math.abs(d)+"px",i.classList.remove("d-none")):(r>=0,l.style.marginRight="0px",t.classList.add("d-none"),i.classList.remove("d-none")):(document.querySelector(".main-menu").style.marginLeft="0px",document.querySelector(".main-menu").style.marginRight="0px",t.classList.add("d-none"));let m=document.querySelector(".main-menu > .slide.open"),c=document.querySelector(".main-menu > .slide.open >ul");m&&m.classList.remove("open"),c&&(c.style.display="none"),n()}),i.addEventListener("click",()=>{let l=document.querySelector(".main-menu"),o=document.querySelector(".main-sidebar"),s=Math.ceil(Number(window.getComputedStyle(l).marginLeft.split("px")[0])),r=Math.ceil(Number(window.getComputedStyle(l).marginRight.split("px")[0])),d=l.scrollWidth-o.offsetWidth,m=o.offsetWidth;l.scrollWidth>o.offsetWidth&&(document.querySelector("html").getAttribute("dir")!=="rtl"?Math.abs(d)>Math.abs(s)&&(l.style.marginRight=0,Math.abs(d)>Math.abs(s)+m||(m=Math.abs(d)-Math.abs(s),i.classList.add("d-none")),l.style.marginLeft=Number(l.style.marginLeft.split("px")[0])-Math.abs(m)+"px",t.classList.remove("d-none")):Math.abs(d)>Math.abs(r)&&(l.style.marginLeft=0,Math.abs(d)>Math.abs(r)+m||(m=Math.abs(d)-Math.abs(r),i.classList.add("d-none")),l.style.marginRight=Number(l.style.marginRight.split("px")[0])-Math.abs(m)+"px",t.classList.remove("d-none")));let c=document.querySelector(".main-menu > .slide.open"),y=document.querySelector(".main-menu > .slide.open >ul");c&&c.classList.remove("open"),y&&(y.style.display="none"),n()})}function _(){var d;let t=document.querySelector(".main-menu"),i=document.querySelector(".main-sidebar"),n=document.querySelector(".slide-left"),l=document.querySelector(".slide-right"),o=Math.ceil(Number(window.getComputedStyle(t).marginLeft.split("px")[0])),s=Math.ceil(Number(window.getComputedStyle(t).marginRight.split("px")[0])),r=t.scrollWidth-i.offsetWidth;if(t.scrollWidth>i.offsetWidth?(l.classList.remove("d-none"),n.classList.add("d-none")):(l.classList.add("d-none"),n.classList.add("d-none"),t.style.marginLeft="0px",t.style.marginRight="0px"),document.querySelector("html").getAttribute("data-nav-layout")==="horizontal"&&window.innerWidth>992){document.querySelectorAll(".slide.has-sub.open > ul").forEach(u=>{let f=u,O=document.documentElement;const W=f.closest("li");var E=W.getBoundingClientRect(),R=f.getBoundingClientRect().width,P=E.right+R,M=E.left-R;O.getAttribute("dir")=="rtl"?(u.classList.contains("child1")&&E.left<0&&v(),M<0||W.closest("ul").classList.contains("force-left")&&P<window.innerWidth?f.classList.add("force-left"):f.classList.remove("force-left")):(u.classList.contains("child1")&&E.right>window.innerWidth&&v(),P>window.innerWidth||W.closest("ul").classList.contains("force-left")&&M>0?f.classList.add("force-left"):(M<0,f.classList.remove("force-left")))});let c=document.querySelector(".slide-menu.active.force-left");c&&(document.querySelector("html").getAttribute("dir")!="rtl"?c.getBoundingClientRect().right<innerWidth?c.classList.remove("force-left"):c.getBoundingClientRect().left<0&&(document.documentElement.getAttribute("data-nav-style")=="menu-hover"||document.documentElement.getAttribute("data-nav-style")=="icon-hover"||window.innerWidth>992)&&e.classList.remove("force-left"):c.getBoundingClientRect().left-((d=c.parentElement.closest(".slide-menu"))==null?void 0:d.clientWidth)-c.getBoundingClientRect().width>0&&(document.documentElement.getAttribute("data-nav-style")=="menu-hover"||document.documentElement.getAttribute("data-nav-style")=="icon-hover"||window.innerWidth>992)&&c.classList.remove("force-left")),document.querySelectorAll(".main-menu .has-sub ul").forEach(u=>{if(K(u)){let f=u.getBoundingClientRect();document.documentElement.getAttribute("dir")=="rtl"?f.left<0&&(u.classList.contains("child1")?u.classList.remove("force-left"):u.classList.add("force-left")):f.right>innerWidth&&(u.classList.contains("child1")?u.classList.remove("force-left"):u.classList.add("force-left"))}})}document.querySelector("html").getAttribute("dir")!=="rtl"?(t.scrollWidth>i.offsetWidth&&Math.abs(r)<Math.abs(o)&&(t.style.marginLeft=-r+"px",n.classList.remove("d-none"),l.classList.add("d-none")),o==0?n.classList.add("d-none"):n.classList.remove("d-none")):(t.scrollWidth>i.offsetWidth&&Math.abs(r)<Math.abs(s)&&(t.style.marginRight=-r+"px",n.classList.remove("d-none"),l.classList.add("d-none")),s==0?n.classList.add("d-none"):n.classList.remove("d-none")),(o!=0||s!=0)&&n.classList.remove("d-none")}function K(t){return window.getComputedStyle(t).display!="none"}["switcher-icon-click","switcher-icon-hover","switcher-horizontal"].map(t=>{document.getElementById(t)&&document.getElementById(t).addEventListener("click",()=>{let i=document.querySelector(".main-menu"),n=document.querySelector(".main-sidebar");setTimeout(()=>{i.offsetWidth>n.offsetWidth?document.getElementById("slide-right").classList.remove("d-none"):document.getElementById("slide-right").classList.add("d-none")},100)})});function Q(){window.innerWidth>=992&&(document.querySelector("html"),document.querySelectorAll(".main-menu > li > .side-menu__item").forEach(i=>{i.addEventListener("click",C)}))}function C(){var t=this;let i=document.querySelector("html");var n=t.nextElementSibling;n&&(n.classList.contains("double-menu-active")||(document.querySelector(".slide-menu")&&document.querySelectorAll(".slide-menu").forEach(o=>{o.classList.contains("double-menu-active")&&(o.classList.remove("double-menu-active"),i.setAttribute("data-toggled","double-menu-close"))}),n.classList.add("double-menu-active"),i.setAttribute("data-toggled","double-menu-open")))}window.addEventListener("unload",()=>{document.querySelector(".main-content").removeEventListener("click",v),window.removeEventListener("resize",B),document.querySelectorAll(".main-menu li > .side-menu__item").forEach(n=>n.removeEventListener("click",C))});let X=()=>{document.querySelectorAll(".side-menu__item").forEach(t=>{if(t.classList.contains("active")){let i=t.getBoundingClientRect();t.children[0]&&t.parentElement.classList.contains("has-sub")&&i.top>435&&t.scrollIntoView({behavior:"smooth"})}})};setTimeout(()=>{X()},300);document.querySelector(".main-content").addEventListener("click",()=>{document.querySelectorAll(".slide-menu").forEach(t=>{(document.querySelector("html").getAttribute("data-toggled")=="menu-click-closed"||document.querySelector("html").getAttribute("data-toggled")=="icon-click-closed")&&(t.style.display="none")})});
