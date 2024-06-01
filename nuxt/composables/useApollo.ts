import {ApolloClient, createHttpLink, InMemoryCache} from "@apollo/client/core";
import {provideApolloClient} from "@vue/apollo-composable";
import {setContext} from "@apollo/client/link/context";
import {Ref} from "@vue/reactivity";


const apolloLink = createHttpLink({
    uri: 'http://localhost:8000/graphql',
    // headers: { authorization: authStore.token ? `Bearer ${authStore.token}` : ""}
});

const apolloClient = new ApolloClient({
    cache: new InMemoryCache(),
    link: apolloLink,
})

provideApolloClient(apolloClient);


export const setAuthorization = (token: Ref) => {
    const setAuthorizationLink = setContext((request, previousContext) => ({
        headers: { authorization: token ? `Bearer ${token.value}` : ""}
    }))

    apolloClient.setLink(setAuthorizationLink.concat(apolloLink));
    provideApolloClient(apolloClient);
}

export const useApollo = () => {
    return {
        apolloClient,
        apolloLink
    }
}
