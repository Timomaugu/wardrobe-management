export default defineNuxtRouteMiddleware((to, from) => {
    const token = localStorage.getItem("token");
    if ( typeof(token) !== "undefined" && token !== null ) {
      isLoggedIn = true;
      return navigateTo('/');
    }
    else {
      return navigateTo('/auth/login');
    }
  });