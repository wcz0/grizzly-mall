import{r as n,z as d,v as s,A as m,s as t,T as h,D as f}from"./index.85ebf015.js";import{i as y,T as k}from"./index.02d5dec2.js";import{S as g}from"./index.048bcb93.js";import{L as x}from"./index.56672bd1.js";const w="_item_1h3pz_1",v="_link_1h3pz_8";var i={item:w,link:v};function S(){const[o,c]=n.exports.useState([]),[l,r]=n.exports.useState(!0),a=d(y),p=()=>{r(!0),f.get("/api/workplace/announcement").then(e=>{c(e.data)}).finally(()=>{r(!1)})};n.exports.useEffect(()=>{p()},[]);function u(e){switch(e){case"activity":return"orangered";case"info":return"cyan";case"notice":return"arcoblue";default:return"arcoblue"}}return s(m,{children:[s("div",{style:{display:"flex",justifyContent:"space-between"},children:[t(k.Title,{heading:6,children:a["workplace.announcement"]}),t(x,{children:a["workplace.seeMore"]})]}),t(g,{loading:l,text:{rows:5,width:"100%"},animation:!0,children:t("div",{children:o.map(e=>s("div",{className:i.item,children:[t(h,{color:u(e.type),size:"small",children:a[`workplace.${e.type}`]}),t("span",{className:i.link,children:e.content})]},e.key))})})]})}export{S as default};
