export default defineNuxtRouteMiddleware((to, from) => {
    const token = localStorage.getItem("token");
    if ( typeof(token) !== "undefined" && token !== null ) {
      return navigateTo('/');
    }
    else {
      return navigateTo('/auth/login');
    }
  });