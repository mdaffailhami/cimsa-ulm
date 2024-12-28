import { css } from '@emotion/react';
import { Container, Row } from 'react-bootstrap';
import ProgramButton from './ProgramButton';

export default function ProgramsHeader() {
  return (
    <div
      css={css`
        background-color: red;
      `}
    >
      <Container
        css={css`
          padding-top: 24px;
        `}
      >
        <div
          data-aos='zoom-in'
          data-aos-duration='1200'
          data-aos-once='true'
          css={css`
            color: white;
            text-align: center;
            padding-top: 9px;
          `}
        >
          <h3>
            <b>Thoroughly planned, clearly defined, and accountable efforts.</b>
          </h3>
          <h4 style={{ fontWeight: 'normal' }}>
            We channel our endeavors through four core programs:
          </h4>
          <br />
        </div>
        <Row xs={2} sm={2} md={2} lg={4}>
          <ProgramButton
            href='#activities'
            icon='fa-solid fa-tasks'
            title={'ACTIVITIES'}
            subtitle={'Real impacts'}
          />
          <ProgramButton
            href='#advocacy'
            icon='fa-solid fa-bullhorn'
            title={'ADVOCACY'}
            subtitle={'Multisectoral approach'}
          />
          <ProgramButton
            href='#research'
            icon='fa-solid fa-chart-column'
            title={'RESEARCH'}
            subtitle={'Data-driven'}
          />
          <ProgramButton
            href='#capacity-building'
            icon='fa-regular fa-circle-up'
            title={'CAPACITY BUILDING'}
            subtitle={'Member empowerment'}
          />
        </Row>
        <br />
      </Container>
    </div>
  );
}
