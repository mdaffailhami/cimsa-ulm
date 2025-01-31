import { css } from '@emotion/react';
import { Button, Col } from 'react-bootstrap';
import { getOnHoverAnimationCss } from '../../utils';

export default function ProgramButton({ icon, title, subtitle, href }) {
  return (
    <Col
      data-aos='flip-right'
      data-aos-duration='1200'
      data-aos-once='true'
      className='d-flex justify-content-center align-items-center'
      style={{ marginBottom: '24px' }}
    >
      <Button
        css={css`
          ${getOnHoverAnimationCss(
            1.1,
            css`
              background-color: white !important;
              border: white !important;
              color: red !important;
            `
          )}

          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          background-color: white;
          border-color: white;
          color: red;
          border-radius: 20px;
          width: 190px;
          height: 190px;
        `}
        href={href}
      >
        <i
          className={icon}
          style={{
            fontSize: '40px',
            margin: '20px 0',
          }}
        />
        <h4
          style={{
            fontWeight: 'bold',
            lineHeight: 1.15,
          }}
        >
          {title}
        </h4>
        <p
          css={css`
            color: black;
            line-height: 1.3;
            font-size: 14px;

            @media (min-width: 576px) {
              font-size: 15.95px;
            }
          `}
        >
          {subtitle}
        </p>
      </Button>
    </Col>
  );
}
