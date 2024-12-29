import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import OrganizationStructure from './OrganizationStructure';

export default function OfficialsPage() {
  return (
    <>
      <PageHeader
        title='The Officials'
        description='Endless gratitude for all of your contributions to CIMSA UGM.'
        myCss={css`
          margin-top: 100px;
          margin-bottom: 50px;
        `}
      />
      <OrganizationStructure />
    </>
  );
}
