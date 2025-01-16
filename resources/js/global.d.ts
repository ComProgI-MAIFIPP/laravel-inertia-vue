import { PageProps as InertiaPageProps } from '@inertiajs/core';

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $page: {
      props: InertiaPageProps & {
        auth: {
          user: {
            id: number;
            name: string;
            email: string;
          };
        };
      };
    };
  }
}
