import { css } from '@emotion/react';
import { Col, Row } from 'react-bootstrap';

export default function FocusesMissionSection({ name, focuses, mission }) {
  return (
    <Row
      as='section'
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
      <MyCol title={`${name}'s Mission Statement`}>
        <p>{mission}</p>
      </MyCol>
      <MyCol title={`${name}'s Areas of Focus`}>
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
      <h2 className='fw-bold text-center'>{title}</h2>
      <hr style={{ borderWidth: '2.8px', opacity: 1 }} />
      <div
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
