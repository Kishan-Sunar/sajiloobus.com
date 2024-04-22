export const useApiFetch = (url, options) => {
    const runtimeConfig = useRuntimeConfig();
    let headers = {
        accept: 'application/json',
    };
    const token = useCookie("XSRF-TOKEN");
    if (token.value) {
        headers["X-XSRF-TOKEN"] = token.value;
    }
    if (process.server) {
        headers = {
        ...headers,
        ...useRequestHeaders(['cookie'])
        }
    }
    const apiFetch = $fetch.create({
        onResponse({ request, response, options }) {
            // Process the response data
            if (response.status === 401 || response.status === 419) {
                usePassengerStore().$reset();
            }
        },
        baseURL: runtimeConfig.public.apiURL,
        credentials: "include",
        watch: false,
        ...options,
        headers: {
            ...headers,
            ...options?.headers,
        },
    });

    return apiFetch(url, {
        credentials: "include",
        ...options,
    });
};
