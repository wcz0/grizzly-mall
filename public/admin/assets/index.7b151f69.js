import{P as vr}from"./index.36e488d1.js";function fr(Z,nr){return nr.forEach(function(s){s&&typeof s!="string"&&!Array.isArray(s)&&Object.keys(s).forEach(function(o){if(o!=="default"&&!(o in Z)){var n=Object.getOwnPropertyDescriptor(s,o);Object.defineProperty(Z,o,n.get?n:{enumerable:!0,get:function(){return s[o]}})}})}),Object.freeze(Object.defineProperty(Z,Symbol.toStringTag,{value:"Module"}))}var sr={exports:{}};(function(Z,nr){(function(o,n){Z.exports=n()})(vr,function(){return function(s){var o={};function n(t){if(o[t])return o[t].exports;var L=o[t]={exports:{},id:t,loaded:!1};return s[t].call(L.exports,L,L.exports,n),L.loaded=!0,L.exports}return n.m=s,n.c=o,n.p="",n(0)}([function(s,o,n){var t;t=function(L){return{clustering:n(1),regression:n(5),statistics:n(6),histogram:n(15),transform:{regression:n(18),histogram:n(21),clustering:n(22)}}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(2),P=g.dataPreprocess,d=g.normalizeDimensions,l=n(3),r=n(4),m=l.size,E=l.sumOfColumn,e=l.sum,p=l.zeros,r=n(4),u=r.isNumber,v=Math.pow,a={SINGLE:"single",MULTIPLE:"multiple"};function f(M,N,y){for(var F=p(M.length,2),I=D(N,z(M,y.dimensions)),A=!0,U,T,R,C;A;){A=!1;for(var S=0;S<M.length;S++){U=1/0,T=-1;for(var O=0;O<N;O++)R=x(M[S],I[O],y),R<U&&(U=R,T=O);F[S][0]!==T&&(A=!0),F[S][0]=T,F[S][1]=U}for(var S=0;S<N;S++){C=[];for(var O=0;O<F.length;O++)F[O][0]===S&&C.push(M[O]);I[S]=c(C,y)}}var J={centroids:I,clusterAssigned:F};return J}function c(M,N){for(var y=[],F,I,A=0;A<N.dimensions.length;A++){var U=N.dimensions[A];F=0;for(var T=0;T<M.length;T++)F+=M[T][U];I=F/M.length,y.push(I)}return y}function i(M,N,y){var F=(u(N)?{clusterCount:N,stepByStep:y}:N)||{clusterCount:2},I=F.clusterCount;if(I<2)return;var A=K(M,F),U=A.outputType===a.SINGLE,T=P(M,{dimensions:A.dimensions}),R=p(T.length,2),C,S,O;function J(W,G){R[W][1]=G}function X(W){return R[W][1]}if(U){C=[];var er=A.outputClusterIndexDimension;S=function(W,G){C[W][er]=G},O=function(W){return C[W][er]};for(var V=0;V<T.length;V++)C.push(T[V].slice()),J(V,0),S(V,0)}else S=function(W,G){R[W][0]=G},O=function(W){return R[W][0]};for(var tr=c(T,A),Q=[tr],V=0;V<T.length;V++){var ur=x(T[V],tr,A);J(V,ur)}var q,j,w,$,k,_,ar=1,b={data:C,centroids:Q,isEnd:!1};U||(b.clusterAssment=R);function ir(){if(ar<I){q=1/0;for(var W,G,H,Y=0;Y<Q.length;Y++){j=[],w=[];for(var B=0;B<T.length;B++)O(B)===Y?j.push(T[B]):w.push(X(B));$=f(j,2,A),k=E($.clusterAssigned,1),_=e(w),k+_<q&&(q=_+k,W=Y,G=$.centroids,H=$.clusterAssigned)}for(var B=0;B<H.length;B++)H[B][0]===0?H[B][0]=W:H[B][0]===1&&(H[B][0]=Q.length);Q[W]=G[0],Q.push(G[1]);for(var B=0,Y=0;B<T.length&&Y<H.length;B++)O(B)===W&&(S(B,H[Y][0]),J(B,H[Y++][1]));var rr=[];if(!U){for(var B=0;B<Q.length;B++){rr[B]=[];for(var Y=0;Y<T.length;Y++)O(Y)===B&&rr[B].push(T[Y])}b.pointsInCluster=rr}ar++}else b.isEnd=!0}if(F.stepByStep)b.next=function(){return ir(),h(b,A),b};else for(;ir(),!b.isEnd;);return h(b,A),b}function h(M,N){var y=N.outputCentroidDimensions;if(!(N.outputType!==a.SINGLE||y==null))for(var F=M.data,I=M.centroids,A=0;A<F.length;A++)for(var U=F[A],T=U[N.outputClusterIndexDimension],R=I[T],C=Math.min(R.length,y.length),S=0;S<C;S++)U[y[S]]=R[S]}function D(M,N){for(var y=p(M,N.length),F=0;F<N.length;F++)for(var I=N[F],A=0;A<M;A++)y[A][F]=I.min+I.span*Math.random();return y}function x(M,N,y){for(var F=0,I=y.dimensions,A=y.rawExtents,U=0;U<I.length;U++){var T=A[U].span;if(T){var R=I[U],C=(M[R]-N[U])/T;F+=v(C,2)}}return F}function K(M,N){var y=m(M);if(y.length<1)throw new Error("The input data of clustering should be two-dimension array.");for(var F=y[1],I=[],A=0;A<F;A++)I.push(A);var U=d(N.dimensions,I),T=N.outputType||a.MULTIPLE,R=N.outputClusterIndexDimension;if(T===a.SINGLE&&!r.isNumber(R))throw new Error("outputClusterIndexDimension is required as a number.");var C=z(M,U);return{dimensions:U,rawExtents:C,outputType:T,outputClusterIndexDimension:R,outputCentroidDimensions:N.outputCentroidDimensions}}function z(M,N){for(var y=[],F=N.length,I=0;I<F;I++)y.push({min:1/0,max:-1/0});for(var I=0;I<M.length;I++)for(var A=M[I],U=0;U<F;U++){var T=y[U],R=A[N[U]];T.min>R&&(T.min=R),T.max<R&&(T.max=R)}for(var I=0;I<F;I++)y[I].span=y[I].max-y[I].min;return y}return{OutputType:a,hierarchicalKMeans:i}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(3),P=g.isArray,d=g.size,l=n(4),m=l.isNumber;function E(r,u){return typeof r=="number"?[r]:r==null?u:r}function e(r,u){u=u||{};var v=u.dimensions,a={};if(v!=null)for(var f=0;f<v.length;f++)a[v[f]]=!0;var c=u.toOneDimensionArray?v?v[0]:0:null;function i(M){return!v||a.hasOwnProperty(M)}if(!P(r))throw new Error("Invalid data type, you should input an array");var h=[],D=d(r);if(D.length===1)for(var f=0;f<D[0];f++){var x=r[f];m(x)&&h.push(x)}else if(D.length===2)for(var f=0;f<D[0];f++){for(var K=!0,x=r[f],z=0;z<D[1];z++)i(z)&&!m(x[z])&&(K=!1);K&&h.push(c!=null?x[c]:x)}return h}function p(r){var u=r.toString(),v=u.indexOf(".");return v<0?0:u.length-1-v}return{normalizeDimensions:E,dataPreprocess:e,getPrecision:p}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=Object.prototype.toString,P=Array.prototype,d=P.map;function l(a){for(var f=[];m(a);)f.push(a.length),a=a[0];return f}function m(a){return g.call(a)==="[object Array]"}function E(a,f){for(var c=[],i=0;i<a;i++){c[i]=[];for(var h=0;h<f;h++)c[i][h]=0}return c}function e(a){for(var f=0,c=0;c<a.length;c++)f+=a[c];return f}function p(a,f){for(var c=0,i=0;i<a.length;i++)c+=a[i][f];return c}function r(a,f){return a>f?1:a<f?-1:a===f?0:NaN}function u(a,f,c,i){for(c==null&&(c=0),i==null&&(i=a.length);c<i;){var h=Math.floor((c+i)/2),D=r(a[h],f);if(D>0)i=h;else if(D<0)c=h+1;else return h+1}return c}function v(a,f,c){if(!!(a&&f)){if(a.map&&a.map===d)return a.map(f,c);for(var i=[],h=0,D=a.length;h<D;h++)i.push(f.call(c,a[h],h,a));return i}}return{size:l,isArray:m,zeros:E,sum:e,sumOfColumn:p,ascending:r,bisect:u,map:v}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){function g(l){return l=l===null?NaN:+l,typeof l=="number"&&!isNaN(l)}function P(l){return isFinite(l)&&l===Math.round(l)}function d(l){if(l===0)return 0;var m=Math.floor(Math.log(l)/Math.LN10);return l/Math.pow(10,m)>=10&&m++,m}return{isNumber:g,isInteger:P,quantityExponent:d}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(2),P=g.dataPreprocess,d=g.normalizeDimensions,l={linear:function(e,p){for(var r=p.dimensions[0],u=p.dimensions[1],v=0,a=0,f=0,c=0,i=e.length,h=0;h<i;h++){var D=e[h];v+=D[r],a+=D[u],f+=D[r]*D[u],c+=D[r]*D[r]}for(var x=(i*f-v*a)/(i*c-v*v),K=a/i-x*v/i,z=[],M=0;M<e.length;M++){var D=e[M],N=D.slice();N[r]=D[r],N[u]=x*D[r]+K,z.push(N)}var y="y = "+Math.round(x*100)/100+"x + "+Math.round(K*100)/100;return{points:z,parameter:{gradient:x,intercept:K},expression:y}},linearThroughOrigin:function(e,p){for(var r=p.dimensions[0],u=p.dimensions[1],v=0,a=0,f=0;f<e.length;f++){var c=e[f];v+=c[r]*c[r],a+=c[r]*c[u]}for(var i=a/v,h=[],D=0;D<e.length;D++){var c=e[D],x=c.slice();x[r]=c[r],x[u]=c[r]*i,h.push(x)}var K="y = "+Math.round(i*100)/100+"x";return{points:h,parameter:{gradient:i},expression:K}},exponential:function(e,p){for(var r=p.dimensions[0],u=p.dimensions[1],v=0,a=0,f=0,c=0,i=0,h=0,D=0;D<e.length;D++){var x=e[D];v+=x[r],a+=x[u],h+=x[r]*x[u],f+=x[r]*x[r]*x[u],c+=x[u]*Math.log(x[u]),i+=x[r]*x[u]*Math.log(x[u])}for(var K=a*f-h*h,z=Math.pow(Math.E,(f*c-h*i)/K),M=(a*i-h*c)/K,N=[],y=0;y<e.length;y++){var x=e[y],F=x.slice();F[r]=x[r],F[u]=z*Math.pow(Math.E,M*x[r]),N.push(F)}var I="y = "+Math.round(z*100)/100+"e^("+Math.round(M*100)/100+"x)";return{points:N,parameter:{coefficient:z,index:M},expression:I}},logarithmic:function(e,p){for(var r=p.dimensions[0],u=p.dimensions[1],v=0,a=0,f=0,c=0,i=0;i<e.length;i++){var h=e[i];v+=Math.log(h[r]),a+=h[u]*Math.log(h[r]),f+=h[u],c+=Math.pow(Math.log(h[r]),2)}for(var D=(i*a-f*v)/(i*c-v*v),x=(f-D*v)/i,K=[],z=0;z<e.length;z++){var h=e[z],M=h.slice();M[r]=h[r],M[u]=D*Math.log(h[r])+x,K.push(M)}var N="y = "+Math.round(x*100)/100+" + "+Math.round(D*100)/100+"ln(x)";return{points:K,parameter:{gradient:D,intercept:x},expression:N}},polynomial:function(e,p){var r=p.dimensions[0],u=p.dimensions[1],v=p.order;v==null&&(v=2);for(var a=[],f=[],c=v+1,i=0;i<c;i++){for(var h=0,D=0;D<e.length;D++){var x=e[D];h+=x[u]*Math.pow(x[r],i)}f.push(h);for(var K=[],z=0;z<c;z++){for(var M=0,N=0;N<e.length;N++)M+=Math.pow(e[N][r],i+z);K.push(M)}a.push(K)}a.push(f);for(var y=m(a,c),F=[],i=0;i<e.length;i++){for(var I=0,x=e[i],D=0;D<y.length;D++)I+=y[D]*Math.pow(x[r],D);var A=x.slice();A[r]=x[r],A[u]=I,F.push(A)}for(var U="y = ",i=y.length-1;i>=0;i--)i>1?U+=Math.round(y[i]*Math.pow(10,i+1))/Math.pow(10,i+1)+"x^"+i+" + ":i===1?U+=Math.round(y[i]*100)/100+"x + ":U+=Math.round(y[i]*100)/100;return{points:F,parameter:y,expression:U}}};function m(e,p){for(var r=0;r<e.length-1;r++){for(var u=r,v=r+1;v<e.length-1;v++)Math.abs(e[r][v])>Math.abs(e[r][u])&&(u=v);for(var a=r;a<e.length;a++){var f=e[a][r];e[a][r]=e[a][u],e[a][u]=f}for(var c=r+1;c<e.length-1;c++)for(var i=e.length-1;i>=r;i--)e[i][c]-=e[i][r]/e[r][r]*e[r][c]}for(var h=new Array(p),D=e.length-1,v=e.length-2;v>=0;v--){for(var f=0,r=v+1;r<e.length-1;r++)f+=e[r][v]*h[r];h[v]=(e[D][v]-f)/e[v][v]}return h}var E=function(e,p,r){var u=typeof r=="number"?{order:r}:r||{},v=d(u.dimensions,[0,1]),a=P(p,{dimensions:v}),f=l[e](a,{order:u.order,dimensions:v}),c=v[0];return f.points.sort(function(i,h){return i[c]-h[c]}),f};return E}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g={};return g.max=n(7),g.deviation=n(8),g.mean=n(10),g.median=n(12),g.min=n(14),g.quantile=n(13),g.sampleVariance=n(9),g.sum=n(11),g}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(4),P=g.isNumber;function d(l){for(var m=-1/0,E=0;E<l.length;E++)P(l[E])&&l[E]>m&&(m=l[E]);return m}return d}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(9);return function(P){var d=g(P);return d&&Math.sqrt(d)}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(4),P=g.isNumber,d=n(10);function l(m){var E=m.length;if(!E||E<2)return 0;if(m.length>=2){for(var e=d(m),p=0,r,u=0;u<m.length;u++)P(m[u])&&(r=m[u]-e,p+=r*r);return p/(m.length-1)}}return l}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(11);function P(d){var l=d.length;return l?g(d)/d.length:0}return P}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(4),P=g.isNumber;function d(l){var m=l.length;if(!m)return 0;for(var E=0,e=0;e<m;e++)P(l[e])&&(E+=l[e]);return E}return d}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(13);function P(d){return g(d,.5)}return P}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){return function(g,P){var d=g.length;if(!d)return 0;if(P<=0||d<2)return g[0];if(P>=1)return g[d-1];var l=(d-1)*P,m=Math.floor(l),E=g[m],e=g[m+1];return E+(e-E)*(l-m)}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(4),P=g.isNumber;function d(l){for(var m=1/0,E=0;E<l.length;E++)P(l[E])&&l[E]<m&&(m=l[E]);return m}return d}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(7),P=n(14),d=n(13),l=n(8),m=n(2),E=m.dataPreprocess,e=m.normalizeDimensions,p=n(3),r=p.ascending,u=p.map,v=n(16),a=p.bisect,f=n(17);function c(O,D){for(var x=typeof D=="string"?{method:D}:D||{},K=x.method==null?i.squareRoot:i[x.method],z=e(x.dimensions),M=E(O,{dimensions:z,toOneDimensionArray:!0}),N=g(M),y=P(M),F=K(M,y,N),I=f(y,N,F),A=I.step,U=I.toFixedPrecision,T=v(+(Math.ceil(y/A)*A).toFixed(U),+(Math.floor(N/A)*A).toFixed(U),A,U),R=T.length,C=new Array(R+1),S=0;S<=R;S++)C[S]={},C[S].sample=[],C[S].x0=S>0?T[S-1]:T[S]-y===A?y:T[S]-A,C[S].x1=S<R?T[S]:N-T[S-1]===A?N:T[S-1]+A;for(var S=0;S<M.length;S++)y<=M[S]&&M[S]<=N&&C[a(T,M[S],0,R)].sample.push(M[S]);var O=u(C,function(X){return[+((X.x0+X.x1)/2).toFixed(U),X.sample.length,X.x0,X.x1,X.x0+" - "+X.x1]}),J=u(C,function(X){return[X.x0,X.x1,X.sample.length]});return{bins:C,data:O,customData:J}}var i={squareRoot:function(h){var D=Math.ceil(Math.sqrt(h.length));return D>50?50:D},scott:function(h,D,x){return Math.ceil((x-D)/(3.5*l(h)*Math.pow(h.length,-1/3)))},freedmanDiaconis:function(h,D,x){return h.sort(r),Math.ceil((x-D)/(2*(d(h,.75)-d(h,.25))*Math.pow(h.length,-1/3)))},sturges:function(h){return Math.ceil(Math.log(h.length)/Math.LN2)+1}};return c}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(2),P=g.getPrecision;return function(d,l,m,E){var e=arguments.length;e<2?(l=d,d=0,m=1):e<3?m=1:e<4?(m=+m,E=P(m)):E=+E;for(var p=Math.ceil(((l-d)/m).toFixed(E)),r=new Array(p+1),u=0;u<p+1;u++)r[u]=+(d+u*m).toFixed(E);return r}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(4);return function(P,d,l){var m=Math.abs(d-P)/l,E=g.quantityExponent(m),e=Math.pow(10,E),p=m/e;p>=Math.sqrt(50)?e*=10:p>=Math.sqrt(10)?e*=5:p>=Math.sqrt(2)&&(e*=2);var r=E<0?-E:0,u=+(d>=P?e:-e).toFixed(r);return{step:u,toFixedPrecision:r}}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(5),P=n(19),d=2;return{type:"ecStat:regression",transform:function(m){var E=m.upstream,e=m.config||{},p=e.method||"linear",r=g(p,E.cloneRawData(),{order:e.order,dimensions:P.normalizeExistingDimensions(m,e.dimensions)}),u=r.points,v=e.formulaOn;v==null&&(v="end");var a;if(v!=="none"){for(var f=0;f<u.length;f++)u[f][d]=v==="start"&&f===0||v==="all"||v==="end"&&f===u.length-1?r.expression:"";a=E.cloneAllDimensionInfo(),a[d]={}}return[{dimensions:a,data:u}]}}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(3),P=n(4),d=n(20);function l(E,e){if(e==null)return;var p=E.upstream;if(g.isArray(e)){for(var r=[],u=0;u<e.length;u++){var v=p.getDimensionInfo(e[u]);a(v,e[u]),r[u]=v.index}return r}else{var v=p.getDimensionInfo(e);return a(v,e),v.index}function a(f,c){if(!f)throw new Error("Can not find dimension by "+c)}}function m(E){if(g.isArray(E)){for(var e=[],p=[],r=0;r<E.length;r++){var u=v(E[r]);e.push(u.name),p.push(u.index)}return{name:e,index:p}}else if(E!=null)return v(E);function v(a){if(P.isNumber(a))return{index:a};if(d.isObject(a)&&P.isNumber(a.index))return a;throw new Error("Illegle new dimensions config. Expect `{ name: string, index: number }`.")}}return{normalizeExistingDimensions:l,normalizeNewDimensions:m}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){function g(d,l){if(Object.assign)Object.assign(d,l);else for(var m in l)l.hasOwnProperty(m)&&(d[m]=l[m]);return d}function P(d){const l=typeof d;return l==="function"||!!d&&l==="object"}return{extend:g,isObject:P}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(15),P=n(19);return{type:"ecStat:histogram",transform:function(l){var m=l.upstream,E=l.config||{},e=g(m.cloneRawData(),{method:E.method,dimensions:P.normalizeExistingDimensions(l,E.dimensions)});return[{dimensions:["MeanOfV0V1","VCount","V0","V1","DisplayableName"],data:e.data},{data:e.customData}]}}}.call(o,n,o,s),t!==void 0&&(s.exports=t)},function(s,o,n){var t;t=function(L){var g=n(1),P=n(4),d=n(19),l=P.isNumber;return{type:"ecStat:clustering",transform:function(E){var e=E.upstream,p=E.config||{},r=p.clusterCount;if(!l(r)||r<=0)throw new Error('config param "clusterCount" need to be specified as an interger greater than 1.');if(r===1)return[{},{data:[]}];var u=d.normalizeNewDimensions(p.outputClusterIndexDimension),v=d.normalizeNewDimensions(p.outputCentroidDimensions);if(u==null)throw new Error("outputClusterIndexDimension is required as a number.");for(var a=g.hierarchicalKMeans(e.cloneRawData(),{clusterCount:r,stepByStep:!1,dimensions:d.normalizeExistingDimensions(E,p.dimensions),outputType:g.OutputType.SINGLE,outputClusterIndexDimension:u.index,outputCentroidDimensions:(v||{}).index}),f=e.cloneAllDimensionInfo(),c=[],i=0;i<f.length;i++){var h=f[i];c.push(h.name)}if(c[u.index]=u.name,v)for(var i=0;i<v.index.length;i++)v.name[i]!=null&&(c[v.index[i]]=v.name[i]);return[{dimensions:c,data:a.data},{data:a.centroids}]}}}.call(o,n,o,s),t!==void 0&&(s.exports=t)}])})})(sr);var or=sr.exports,cr=fr({__proto__:null,default:or},[or]);export{cr as i};
