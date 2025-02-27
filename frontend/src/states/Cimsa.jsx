import useSWR from 'swr';
import { endpoint } from '../configs';
import { fetchJSON } from '../utils';
import LoadingPage from '../components/LoadingPage';
import LoadFailedPage from '../components/LoadFailedPage';
import { createContext } from 'react';

export const CimsaStateContext = createContext(undefined);

export function CimsaStateProvider({ children }) {
  const cimsa = useSWR(`${endpoint}/api/cimsa-profile`, fetchJSON);

  if (cimsa.isLoading) return <LoadingPage />;
  if (cimsa.error) return <LoadFailedPage />;

  return (
    <CimsaStateContext.Provider
      value={{
        profile: cimsa.data.profile,
        socmeds: cimsa.data.social_media,
      }}
    >
      {children}
    </CimsaStateContext.Provider>
  );
}
