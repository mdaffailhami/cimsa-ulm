import { css } from '@emotion/react';
import { Col, Row } from 'react-bootstrap';

export default function FocusesMissionSection({ focuses, mission }) {
  return (
    <Row
      as='section'
      data-aos='fade'
      data-aos-once='true'
      data-aos-duration='1200'
      xs={1}
      lg={2}
      css={css`
        display: flex;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;

        gap: 24px;
        padding-top: 23px;
        @media (min-width: 992px) {
          gap: 0;
        }
      `}
    >
      <MyCol title={`MISSION STATEMENT`}>
        <p>{mission}</p>
      </MyCol>
      <MyCol title={`AREAS OF FOCUS`}>
        <ol>
          {focuses.map((focus, i) => (
            <li key={i}>
              {i + 1}. {focus}
            </li>
          ))}
        </ol>
      </MyCol>
    </Row>
  );
}

function MyCol({ title, children }) {
  return (
    <Col>
      <h2
        data-aos='zoom-in'
        data-aos-once='true'
        data-aos-duration='1200'
        className='fw-bold text-center'
      >
        {title}
      </h2>
      <hr style={{ borderWidth: '2.8px', opacity: 1 }} />
      <div
        data-aos='fade-up'
        data-aos-once='true'
        data-aos-duration='1200'
        css={css`
          color: black;
          font-size: 18px;

          @media (min-width: 992px) {
            font-size: 20px;
          }
        `}
      >
        {children}
      </div>
    </Col>
  );
}
