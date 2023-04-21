import{R as m,r as h,q as p,s as e,v as d,z as $,aF as k,A as g,ak as I,aG as M}from"./index.66a38464.js";import{i as _,T as y}from"./index.8b31acd8.js";import{L as w}from"./index.e57cf844.js";function Z(t,c){const a=h.exports.useContext(p),s=a.prefixCls,n=s===void 0?"arco":s,r=t.spin,i=t.className,o={"aria-hidden":!0,focusable:!1,ref:c,...t,className:`${i?i+" ":""}${n}-icon ${n}-icon-file`};return r&&(o.className=`${o.className} ${n}-icon-loading`),delete o.spin,delete o.isIcon,e("svg",{fill:"none",stroke:"currentColor",strokeWidth:"4",viewBox:"0 0 48 48",...o,children:e("path",{d:"M16 21h16m-16 8h10m11 13H11a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h21l7 7v27a2 2 0 0 1-2 2Z"})})}const f=m.forwardRef(Z);f.defaultProps={isIcon:!0};f.displayName="IconFile";var x=f;function b(t,c){const a=h.exports.useContext(p),s=a.prefixCls,n=s===void 0?"arco":s,r=t.spin,i=t.className,o={"aria-hidden":!0,focusable:!1,ref:c,...t,className:`${i?i+" ":""}${n}-icon ${n}-icon-fire`};return r&&(o.className=`${o.className} ${n}-icon-loading`),delete o.spin,delete o.isIcon,e("svg",{fill:"none",stroke:"currentColor",strokeWidth:"4",viewBox:"0 0 48 48",...o,children:e("path",{d:"M17.577 27.477C20.022 22.579 17.041 12.98 24.546 6c0 0-1.156 15.55 5.36 17.181 2.145.537 2.68-5.369 4.289-8.59 0 0 .536 4.832 2.68 8.59 3.217 7.517-1 14.117-5.896 17.182-4.289 2.684-14.587 2.807-19.835-5.37-4.824-7.516 0-15.57 0-15.57s4.289 12.35 6.433 8.054Z"})})}const u=m.forwardRef(b);u.defaultProps={isIcon:!0};u.displayName="IconFire";var S=u;function F(t,c){const a=h.exports.useContext(p),s=a.prefixCls,n=s===void 0?"arco":s,r=t.spin,i=t.className,o={"aria-hidden":!0,focusable:!1,ref:c,...t,className:`${i?i+" ":""}${n}-icon ${n}-icon-mobile`};return r&&(o.className=`${o.className} ${n}-icon-loading`),delete o.spin,delete o.isIcon,d("svg",{fill:"none",stroke:"currentColor",strokeWidth:"4",viewBox:"0 0 48 48",...o,children:[e("path",{d:"M17 14h14m6.125 28h-26.25C9.839 42 9 41.105 9 40V8c0-1.105.84-2 1.875-2h26.25C38.16 6 39 6.895 39 8v32c0 1.105-.84 2-1.875 2ZM22 33a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"}),e("circle",{cx:"24",cy:"33",r:"2",fill:"currentColor",stroke:"none"})]})}const v=m.forwardRef(F);v.defaultProps={isIcon:!0};v.displayName="IconMobile";var V=v;function H(t,c){const a=h.exports.useContext(p),s=a.prefixCls,n=s===void 0?"arco":s,r=t.spin,i=t.className,o={"aria-hidden":!0,focusable:!1,ref:c,...t,className:`${i?i+" ":""}${n}-icon ${n}-icon-storage`};return r&&(o.className=`${o.className} ${n}-icon-loading`),delete o.spin,delete o.isIcon,d("svg",{fill:"none",stroke:"currentColor",strokeWidth:"4",viewBox:"0 0 48 48",...o,children:[e("path",{d:"M7 18h34v12H7V18ZM40 6H8a1 1 0 0 0-1 1v11h34V7a1 1 0 0 0-1-1ZM7 30h34v11a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V30Z"}),e("path",{d:"M13.02 36H13v.02h.02V36Z"}),e("path",{fill:"currentColor",stroke:"none",d:"M13 12v-2h-2v2h2Zm.02 0h2v-2h-2v2Zm0 .02v2h2v-2h-2Zm-.02 0h-2v2h2v-2ZM13 14h.02v-4H13v4Zm-1.98-2v.02h4V12h-4Zm2-1.98H13v4h.02v-4Zm1.98 2V12h-4v.02h4Z"}),e("path",{d:"M13.02 24H13v.02h.02V24Z"})]})}const C=m.forwardRef(H);C.defaultProps={isIcon:!0};C.displayName="IconStorage";var N=C;const R="_shortcuts_1kbh5_1",B="_item_1kbh5_5",W="_icon_1kbh5_14",j="_title_1kbh5_20",A="_recent_1kbh5_41";var l={shortcuts:R,item:B,icon:W,title:j,recent:A};function z(){const t=$(_),c=[{title:t["workplace.contentMgmt"],key:"Content Management",icon:e(x,{})},{title:t["workplace.contentStatistic"],key:"Content Statistic",icon:e(N,{})},{title:t["workplace.advancedMgmt"],key:"Advanced Management",icon:e(k,{})},{title:t["workplace.onlinePromotion"],key:"Online Promotion",icon:e(V,{})},{title:t["workplace.marketing"],key:"Marketing",icon:e(S,{})}],a=[{title:t["workplace.contentStatistic"],key:"Content Statistic",icon:e(N,{})},{title:t["workplace.contentMgmt"],key:"Content Management",icon:e(x,{})},{title:t["workplace.advancedMgmt"],key:"Advanced Management",icon:e(k,{})}];function s(n){M.info({content:d("span",{children:["You clicked ",e("b",{children:n})]})})}return d(g,{children:[d("div",{style:{display:"flex",justifyContent:"space-between"},children:[e(y.Title,{heading:6,children:t["workplace.shortcuts"]}),e(w,{children:t["workplace.seeMore"]})]}),e("div",{className:l.shortcuts,children:c.map(n=>d("div",{className:l.item,onClick:()=>s(n.key),children:[e("div",{className:l.icon,children:n.icon}),e("div",{className:l.title,children:n.title})]},n.key))}),e(I,{}),e("div",{className:l.recent,children:t["workplace.recent"]}),e("div",{className:l.shortcuts,children:a.map(n=>d("div",{className:l.item,onClick:()=>s(n.key),children:[e("div",{className:l.icon,children:n.icon}),e("div",{className:l.title,children:n.title})]},n.key))})]})}export{z as default};
