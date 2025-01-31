import { Image } from 'react-bootstrap';
import PrimaryButton from '../../components/PrimaryButton';
import { css } from '@emotion/react';
import { getOnHoverAnimationCss } from '../../utils';

export default function ScoCard({ sco }) {
  return (
    <div data-aos='fade' data-aos-duration='1200' data-aos-once='true'>
      <div
        css={css`
          overflow: hidden;
          max-width: 449px;
          border-radius: 20px;
          background-color: white;
          border: 2px solid ${sco.color};
          ${getOnHoverAnimationCss(1.03)}
        `}
      >
        <Image
          src={sco.logo}
          css={css`
            width: 100%;
            height: 200px;
            object-fit: cover;
          `}
        />
        <div
          css={css`
            padding: 20px;
            text-align: center;
          `}
        >
          <p>{sco.description}</p>
          <PrimaryButton
            to={`/scos/${sco.name.toLowerCase()}`}
            color={sco.color}
            isLarge={false}
          >
            More on {sco.name}
          </PrimaryButton>
        </div>
      </div>
    </div>
  );
}
